<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
    // Route::get('/',function(){
    //     return App\Post::all();
    //     return App\User::all();
    //     // return App\Like::all();
    // });

Route::group(['middleware' => 'guest:api'], function () {
    // Route::get('/post/{id}', 'PostController@showStep');

    // Route::get('/', 'HomeController@showTopPage');

});

Route::group(['middleware' => 'api'],function(){
    // Route::get('/', 'HomeController@showTopPage');

    // いいね Axios
    Route::post('/posts/{post}/like', 'LikeController@like');
    Route::post('/posts/{post}/unlike', 'LikeController@unlike');

    // ストック Axios
    Route::post('/posts/{post}/stock', 'StockController@stock');
    Route::post('/posts/{post}/unstock', 'StockController@unstock');

    // 投稿
    // Route::post('/user/post/new', 'PostController@newpost');
    // Route::post('/user/post/edit', 'PostController@update');

    // いいね Axios
    Route::post('/posts/{post}/challenge', 'ChallengeController@challenge');
    Route::post('/posts/{post}/unchallenge', 'ChallengeController@unchallenge');
    

});

