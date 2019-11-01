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
Route::get('/post', 'PostController@index')->name('post.index');

// --------------------------------->>
// ユーザー関連
// --------------------------------->>
Route::get('/user/{id}', 'UserController@profile')->name('user.profile');
Route::get('/edit/user/', 'UserController@edit')->name('user.edit');
Route::post('/edit/user/', 'UserController@update')->name('user.update');

Route::get('/edit/avatar/', 'AvatarController@edit')->name('avatar.edit');
Route::post('/edit/avatar/', 'AvatarController@update')->name('avatar.update');






// Route::get('{path}', function () {
//     return view('index');
// })->where('path', '(.*)');
