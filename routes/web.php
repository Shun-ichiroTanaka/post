<?php

use RealRashid\SweetAlert\Facades\Alert;


Route::get('/', 'HomeController@showTopPage')->name('home');
Route::get('/home', 'HomeController@showTopPage')->name('home');

// 投稿一覧
Route::get('/post/{id}', 'PostController@showArticle')->name('post.showpost');
// プロフィール詳細
Route::get('/user/{id}', 'UserController@profile')->name('user.profile');


Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {

    // マイページ
    Route::get('/mypage', 'MypageController@index')->name('mypage.index');
    // 設定
    Route::get('/setting', 'SettingController@index')->name('setting.index');

    // 投稿
    Route::get('/post/new', 'PostController@index')->name('post.new');
    Route::post('/post/new', 'PostController@postStep')->name('post.newpost');


    // ユーザー
    Route::get('/edit/user/', 'UserController@edit')->name('user.edit');
    Route::post('/edit/user/', 'UserController@update')->name('user.update');
    Route::get('/edit/avatar/', 'AvatarController@edit')->name('avatar.edit');
    Route::post('/edit/avatar/', 'AvatarController@update')->name('avatar.update');
});

// Route::group(['middleware' => ['auth']], function () {


// });


Auth::routes();
