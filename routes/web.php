<?php

use RealRashid\SweetAlert\Facades\Alert;


Route::get('/', 'HomeController@showTopPage')->name('home');

Route::get('/challenge/{id}', 'ChallengeController@index')->name('challenge.index');
Route::get('/challenge/{id}', 'ChallengeController@index')->name('challenge.index');
Route::get('/challenge/{id}', 'ChallengeController@index')->name('challenge.index');


Route::get('/user/{id}', 'UserController@profile')->name('user.profile');
Route::post('/user/edit/{id}', 'PostController@update');

Route::get('/post/{id}', 'PostController@showStep')->name('post.showpost');
Route::post('/post/delete/{id}', 'PostController@delete');
Route::get('/post/edit/{id}', 'PostController@edit');
Route::post('post/edit/{id}', 'PostController@update')->name('user.update'); 

// 認証
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/mypage', 'MypageController@index')->name('mypage.index');
    Route::get('/setting', 'SettingController@index')->name('setting.index');
    // カリキュラム
    Route::get('/curriculum/{id?}/{page?}', 'CurriculumController@viewcurriculum');

    Route::prefix('post')->group(function () {
        Route::get('/new', 'PostController@index')->name('post.new'); 
        Route::post('/new', 'PostController@newpost')->name('post.newpost');
        Route::post('/delete/{id}', 'PostController@delete');
        // Route::get('/edit/{id}', 'PostController@edit')->name('post.edit');
        
    });
});

// 編集
Route::group(['prefix' => 'edit', 'middleware' => ['auth']], function () {
    Route::get('/user', 'UserController@edit')->name('user.edit');
    Route::post('/user', 'UserController@update')->name('user.update');
});

Auth::routes();
