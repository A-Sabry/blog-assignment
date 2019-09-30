<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Tweet;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TweetRepositoryInterface;

class TweetController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    protected $tweet;

    /* 
     * TweetController constructor.
     *
     * @param TweetRepositoryInterface $tweet
     */

    public function __construct(TweetRepositoryInterface $tweet) {
        $this->tweet = $tweet;
    }

    public function add(Request $request) {

        $user = Auth::user();
        
        if ($user) {
            
            $input = $request->all();
            $data["text"] = $input["text"];
            $data["user_id"] = $user->id;
            
            $tweet = $this->tweet->create($data);

            return response()->json(['success' => true, 'message' => 'tweet created successfully id : ' . $tweet]);
        } else {
            return response()->json(['success' => false, 'message' => 'user not authorised']);
        }
    }

    public function delete(Request $request, $id) {

        $user = Auth::user();

        if ($user && $this->tweet->exists($id) && $this->tweet->get($id)->user == $user) {

            $this->tweet->delete($id);

            return response()->json(['success' => true, 'message' => 'tweet deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'user not authorised']);
        }
    }

    public function all(Request $request) {

        $user = Auth::user();

        if ($user) {
            
            $tweets = $this->tweet->all();

            return response()->json(['success' => true, 'message' => $tweets]);
        } else {
            return response()->json(['success' => false, 'message' => 'user not authorised']);
        }
    }

    public function getTweet(Request $request, $id) {

        $user = Auth::user();

        if ($user) {
            
            $tweet = $this->tweet->get($id);

            return response()->json(['success' => true, 'message' => $tweet]);
        } else {
            return response()->json(['success' => false, 'message' => 'user not authorised']);
        }
    }

}
