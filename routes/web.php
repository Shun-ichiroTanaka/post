<?php

use RealRashid\SweetAlert\Facades\Alert;


Route::get('/', 'HomeController@showTopPage')->name('home');
Route::get('/home', 'HomeController@showTopPage')->name('home');

// 投稿一覧
Route::get('/post/{id}', 'PostController@showStep')->name('post.showpost');
// プロフィール詳細
Route::get('/user/{id}', 'UserController@profile')->name('user.profile');


Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {

    // マイページ
    Route::get('/mypage', 'MypageController@index')->name('mypage.index');
    // 設定
    Route::get('/setting', 'SettingController@index')->name('setting.index');

    Route::prefix('post')->group(function () {
        // 投稿
        Route::get('/new', 'PostController@index')->name('post.new');
        Route::post('/new', 'PostController@postStep')->name('post.newpost');
    });


    Route::prefix('edit')->group(function () {
        // ユーザー
        Route::get('/user', 'UserController@edit')->name('user.edit');
        Route::post('/user', 'UserController@update')->name('user.update');
        // アバター
        Route::get('/avatar', 'AvatarController@edit')->name('avatar.edit');
        Route::post('/avatar', 'AvatarController@update')->name('avatar.update');
    });
});




// Route::group(['middleware' => ['auth']], function () {


// });


Auth::routes();
