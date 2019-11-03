<?php

use RealRashid\SweetAlert\Facades\Alert;

Route::get('/', function () {
    // toast('Success Toast','success');
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/mypage', 'MypageController@index')->name('mypage.index');
Route::get('/setting', 'SettingController@index')->name('setting.index');


// --------------------------------->>
// 投稿
// --------------------------------->>
Route::get('/post', 'PostController@index')->name('post.index');

Route::get('/post/new', 'PostController@new')->name('post.new');
Route::post('/post/new', 'PostController@create')->name('post.create');

Route::get('/post/{id}', 'PostController@show')->name('post.show');
Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');
Route::post('/post/{id}', 'PostController@update')->name('post.update');
Route::post('/post/{id}/delete', 'PostController@delete')->name('post.delete');

// --------------------------------->>
// ユーザー
// --------------------------------->>
Route::get('/user/{id}', 'UserController@profile')->name('user.profile');
Route::get('/edit/user/', 'UserController@edit')->name('user.edit');
Route::post('/edit/user/', 'UserController@update')->name('user.update');
Route::get('/edit/avatar/', 'AvatarController@edit')->name('avatar.edit');
Route::post('/edit/avatar/', 'AvatarController@update')->name('avatar.update');






// Route::get('{path}', function () {
//     return view('index');
// })->where('path', '(.*)');
