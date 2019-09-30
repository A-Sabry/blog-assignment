<?php

namespace App\Repositories;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface {

    /**
     * Get's a user by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($user_id) {
        return User::find($user_id);
    }

    /**
     * Get's all tweets.
     *
     * @return mixed
     */
    public function all() {
        return User::all();
    }

    /**
     * Deletes a tweet.
     *
     * @param int
     */
    public function delete($user_id) {
        User::destroy($user_id);
    }

    /**
     * create a tweet.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data) : User
    {
        return User::create($data);
    }

    /**
     * create a tweet.
     *
     * @param $id
     * @return bool
     */
    public function exists($id) : bool
    {
        return User::where('id',$id)->exists();
    }
}
