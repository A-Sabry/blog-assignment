<?php

namespace App\Repositories;
use App\Tweet;
use Illuminate\Database\Eloquent\Collection;

class TweetRepository implements TweetRepositoryInterface {

    /**
     * Get's a tweet by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($tweet_id) {
        return Tweet::find($tweet_id);
    }

    /**
     * Get's all tweets.
     *
     * @return mixed
     */
    public function all() {
        return Tweet::all();
    }

    /**
     * Deletes a tweet.
     *
     * @param int
     */
    public function delete($tweet_id) {
        Tweet::destroy($tweet_id);
    }

    /**
     * create a tweet.
     *
     * @param array $data
     * @return Tweet
     */
    public function create(array $data) : Tweet
    {
        return Tweet::create($data);
    }

    /**
     * create a tweet.
     *
     * @param $id
     * @return bool
     */
    public function exists($id) : bool
    {
        return Tweet::where('id',$id)->exists();
    }
    
    /**
     * create a tweet.
     *
     * @param $id
     */
    public function getTweetsByUserId($followedIds)
    {
        return Tweet::whereIn('user_id', $followedIds)->get(['text']);
    }
}
