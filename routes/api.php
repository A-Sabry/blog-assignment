<?php

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->post('/tweet', 'API\TweetController@add');

Route::middleware('auth:api')->delete('/tweet/{id}', 'API\TweetController@delete');

Route::middleware('auth:api')->get('/tweet','API\TweetController@all');
Route::middleware('auth:api')->get('/tweet/{id}','API\TweetController@getTweet');


Route::middleware('auth:api')->post('/follow/{id}', 'API\FollowerController@follow');
Route::middleware('auth:api')->get('/timeLine', 'API\UserController@timeLine');

Route::post('login', 'API\UserController@login')->name("login");
Route::post('register', 'API\UserController@register');
