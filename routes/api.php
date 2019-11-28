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

Route::group(['middleware' => 'api'],function(){
    // いいね Axios
    Route::post('/posts/{post}/like', 'LikeController@like');
    Route::post('/posts/{post}/unlike', 'LikeController@unlike');


    // 第一引数にControllerのメソッド名
    Route::post('/user/post/new', 'PostController@postStep');

});
