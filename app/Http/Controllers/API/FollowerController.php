<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Follower;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\FollowerRepositoryInterface;

class FollowerController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    protected $follower;

    /*
     * FollowerController constructor.
     *
     * @param FollowerRepositoryInterface $follower
     */

    public function __construct(FollowerRepositoryInterface $follower) {
        $this->follower = $follower;
    }

    public function follow(Request $request, $id) {

        $follower = Auth::user();
        if ($follower) {
            
            if (!$this->follower->isFollowing($follower->id, $id)) {

                $data["follower_id"] = $follower->id;
                $data["user_id"] = $id;
                
                $follower = $this->follower->create($data);
            } else {
                return response()->json(['success' => true, 'message' => 'you followed this user before']);
            }

            return response()->json(['success' => true, 'message' => 'you followed user successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'user not authorised']);
        }
    }

}
