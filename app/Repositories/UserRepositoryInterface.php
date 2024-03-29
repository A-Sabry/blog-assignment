<?php

namespace App\Repositories;

interface UserRepositoryInterface {

    /**
     * Get's a user by it's ID
     *
     * @param int
     */
    public function get($user_id);

    /**
     * Get's all users.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a user.
     *
     * @param int
     */
    public function delete($user_id);

    /**
     * create a user.
     *
     * @param array $tweetData
     */
    public function create(array $userData);

    /**
     * @param $id
     * @return bool
     */
    public function exists($id);

}
