<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Tweet;
use App\Follower;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TweetRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\FollowerRepositoryInterface;

class UserController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public $successStatus = 200;
    protected $tweet;
    protected $user;
    protected $follower;

    /*    
     * UserController constructor.
     *
     * @param UserRepositoryInterface $user
     */

    public function __construct(TweetRepositoryInterface $tweet, UserRepositoryInterface $user, FollowerRepositoryInterface $follower) {
        $this->tweet = $tweet;
        $this->user = $user;
        $this->follower = $follower;
    }

    /**
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['api_token'] = Str::random(60);

        $user = $this->user->create($input);
        $success['token'] = $user->api_token;
        $success['name'] = $user->name;

        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function login(Request $request) {

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->api_token;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function timeLine(Request $request) {

        $user = Auth::user();
        if ($user) {
            
            $followedIds = $this->follower->getFollowersIds($user->id);
            $tweets = $this->tweet->getTweetsByUserId($followedIds);

            return response()->json(['success' => true, 'message' => 'user time line tweets ' . $tweets]);
        } else {
            return response()->json(['success' => false, 'message' => 'user not authorised']);
        }
    }

}
