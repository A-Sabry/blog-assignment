<?php

namespace App\Repositories;

use App\Follower;
use Illuminate\Database\Eloquent\Collection;

class FollowerRepository implements FollowerRepositoryInterface {

    /**
     * Get's a follower by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($follower_id) {
        return Follower::find($follower_id);
    }

    /**
     * Get's all followers.
     *
     * @return mixed
     */
    public function all() {
        return Follower::all();
    }

    /**
     * Deletes a follower.
     *
     * @param int
     */
    public function delete($follower_id) {
        Follower::destroy($follower_id);
    }

    /**
     * create a follower.
     *
     * @param array $data
     * @return Follower
     */
    public function create(array $data): Follower {
        return Follower::create($data);
    }

    /**
     *
     * @param $id
     */
    public function getFollowersIds($user_id) {
        return Follower::where('follower_id', $user_id)->get();
    }

    /**
     * @param $id
     */
    public function isFollowing($follower_id, $user_id): bool {
        return Follower::where('follower_id', $follower_id)->where("user_id",$user_id)->exists();
    }

}
