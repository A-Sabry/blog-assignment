<?php

namespace App\Repositories;

interface TweetRepositoryInterface {

    /**
     * Get's a tweet by it's ID
     *
     * @param int
     */
    public function get($tweet_id);

    /**
     * Get's all tweets.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a tweet.
     *
     * @param int
     */
    public function delete($tweet_id);

    /**
     * create a tweet.
     *
     * @param array $tweetData
     */
    public function create(array $tweetData);

    /**
     * create a tweet.
     *
     * @param $id
     * @return bool
     */
    public function exists($id);
    
    /**
     * create a tweet.
     *
     * @param $id
     */
    public function getTweetsByUserId($followedIds);

}
