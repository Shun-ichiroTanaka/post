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
Route::get('/profile', 'UserController@index')->name('profile.index');







// Route::get('{path}', function () {
//     return view('index');
// })->where('path', '(.*)');
