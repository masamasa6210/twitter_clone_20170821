<?php

/*
|--------------------------------------------------------------------------
| Webルート
|--------------------------------------------------------------------------
|
| ここでアプリケーションのWebルートを登録できます。"web"ルートは
| ミドルウェアのグループの中へ、RouteServiceProviderによりロード
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::get('home', 'HomeController@index')->name('home');
Route::post('home', 'HomeController@tweet');

Route::get('user/{url_name}', 'UserController@user');
Route::get('setting/profile', 'SettingController@profile');
Route::put('setting/profile', 'SettingController@profile_update');

Route::get('setting/account', 'SettingController@account');
Route::put('setting/account', 'SettingController@account_update');

Route::get('search', 'HomeController@search');

Route::get('following', 'FollowController@followers');
Route::post('{url_name}/follow', 'FollowController@follow');
Route::delete('{url_name}/unfollow', 'FollowController@unfollow');
