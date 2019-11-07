<?php

use RealRashid\SweetAlert\Facades\Alert;


Route::get('/', 'HomeController@showTopPage')->name('home');
Route::get('/post/{id}', 'PostController@showArticle')->name('post.showpost');




Route::group(['middleware' => ['auth']], function () {

    Route::get('/mypage', 'MypageController@index')->name('mypage.index');
    Route::get('/setting', 'SettingController@index')->name('setting.index');

    // --------------------------------->>
    // 投稿
    // --------------------------------->>
    Route::get('/post/new', 'PostController@index')->name('post.new');
    Route::post('/post/new', 'PostController@postArticle')->name('post.newpost');


    // --------------------------------->>
    // ユーザー
    // --------------------------------->>
    Route::get('/user/{id}', 'UserController@profile')->name('user.profile');
    Route::get('/edit/user/', 'UserController@edit')->name('user.edit');
    Route::post('/edit/user/', 'UserController@update')->name('user.update');
    Route::get('/edit/avatar/', 'AvatarController@edit')->name('avatar.edit');
    Route::post('/edit/avatar/', 'AvatarController@update')->name('avatar.update');

});


Auth::routes();
