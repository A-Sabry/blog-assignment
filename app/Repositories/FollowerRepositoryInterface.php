<?php

namespace App\Repositories;

interface FollowerRepositoryInterface {

    /**
     * Get's a follower by it's ID
     *
     * @param int
     */
    public function get($follower_id);

    /**
     * Get's all followers.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a follower.
     *
     * @param int
     */
    public function delete($follower_id);

    /**
     * create a follower.
     *
     * @param array $followerData
     */
    public function create(array $followerData);

    /**
     * @return bool
     */
    public function isFollowing($follower_id, $user_id): bool;
    
    /**
     * create a follower.
     *
     * @param $id
     * 
     */
    public function getFollowersIds($user_id);

}
