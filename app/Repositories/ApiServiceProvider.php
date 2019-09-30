<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\TweetRepositoryInterface',
            'App\Repositories\TweetRepository'
        );
        $this->app->bind(
            'App\Repositories\FollowerRepositoryInterface',
            'App\Repositories\FollowerRepository'
        );
        $this->app->bind(
            'App\Repositories\UserRepositoryInterface',
            'App\Repositories\UserRepository'
            
        );
    }
}