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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('tests/test', 'TestController@index');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('post', 'PostController@index')->name('post');

Route::get('contact', 'ContactController@index')->name('contact');

Route::get('faq', 'FaqController@index')->name('faq');

Route::get('about', 'AboutController@index')->name('about');

Route::get('policy', 'PolicyController@index')->name('policy');

Route::get('policy_confirm', 'PolicyConfirmController@index')->name('policy_confirm');

// Route::get('home', 'HomeController@index')->name('home');

Route::get('product/detail', 'ProductDetailController@index')->name('detail');

Route::get('user/index', 'Admin\UserController@index')->name('user');
Route::get('user/edit', 'Admin\UserController@edit');
Route::post('user/edit', 'Admin\UserController@update');

Route::get('changepassword', 'HomeController@showChangePasswordForm');
Route::post('changepassword', 'HomeController@changePassword')->name('changepassword');

// googleのログイン認証
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
