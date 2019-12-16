<?php

use RealRashid\SweetAlert\Facades\Alert;


Route::get('/', 'HomeController@showTopPage')->name('home');
Route::get('/post/{id}', 'PostController@showStep')->name('post.showpost');
Route::get('/user/{id}', 'UserController@profile')->name('user.profile');

// 認証
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/mypage', 'MypageController@index')->name('mypage.index');
    Route::get('/setting', 'SettingController@index')->name('setting.index');
    // カリキュラム
    Route::get('/curriculum/{id?}/{page?}', 'CurriculumController@viewcurriculum');

    Route::prefix('post')->group(function () {
        Route::get('/new', 'PostController@index')->name('post.new');
        // Route::post('/new', 'PostController@postStep')->name('post.newpost');
    });

    // 編集
    Route::prefix('edit')->group(function () {
        Route::get('/user', 'UserController@edit')->name('user.edit');
        Route::post('/user', 'UserController@update')->name('user.update');
    });
});

Auth::routes();
