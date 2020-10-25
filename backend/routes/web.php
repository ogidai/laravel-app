<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

// errorページの表示
Route::get('error/{code}', function ($code) {
  abort($code);
});

Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@index');

// 投稿
Route::prefix('post')->group(function () {
  Route::get('index', 'PostController@index')->name('your_post');
  Route::get('show/{id}', 'PostController@show')->name('post.show');
  Route::get('create', 'PostController@create')->name('post');
  Route::post('store', 'PostController@store');
  Route::get('store', 'PostController@store');
  Route::post('noImageStore', 'PostController@noImageStore');
  Route::get('noImageStore', 'PostController@noImageStore');
  Route::get('edit/{id}', 'PostController@edit')->name('post.edit');
  Route::post('edit/{id}', 'PostController@update')->name('post.update');
  Route::get('destroy/{id}', 'PostController@destroy')->name('post.destroy');
});

Route::get('product/detail/{id}', 'ProductDetailController@index')->name('detail');

// ユーザー情報
Route::prefix('user')->group(function () {
  Route::get('index', 'Admin\UserController@index')->name('user');
  Route::get('edit', 'Admin\UserController@edit');
  Route::post('edit', 'Admin\UserController@update');
  Route::get('delete_account', 'Admin\UserController@show')->name('delete');
  Route::get('destroy', 'Admin\UserController@destroy');
});

Route::get('about', 'GeneralController@showAboutPage')->name('about');
Route::get('faq', 'GeneralController@showFaqPage')->name('faq');
Route::get('contact', 'GeneralController@showContactPage')->name('contact');
Route::get('policy', 'GeneralController@showPolicyPage')->name('policy');
Route::get('policy_confirm', 'GeneralController@showPolicyConfirmPage')->name('policy_confirm');
Route::get('support', 'GeneralController@showSupportPage')->name('support');
Route::get('search/top', 'GeneralController@showSearchPage')->name('search');

Route::get('changepassword', 'HomeController@showChangePasswordForm');
Route::post('changepassword', 'HomeController@changePassword')->name('changepassword');

Route::get('register_complete', 'RegisterCompleteController@register')->name('register_complete');
Route::get('register_complete_gmail', 'RegisterCompleteController@registerByGmail')->name('register_complete_gmail');

// googleのログイン認証
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
