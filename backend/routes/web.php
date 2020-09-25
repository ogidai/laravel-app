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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('post/index', 'PostController@index')->name('your_post');
Route::get('post/show/{id}', 'PostController@show')->name('post.show');
Route::get('post/create', 'PostController@create')->name('post');
Route::post('post/store', 'PostController@store');
Route::get('post/store', 'PostController@store');
Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('post/edit/{id}', 'PostController@update')->name('post.update');
Route::get('post/destroy/{id}', 'PostController@destroy')->name('post.destroy');

Route::get('contact', 'ContactController@index')->name('contact');

Route::get('faq', 'FaqController@index')->name('faq');

Route::get('about', 'AboutController@index')->name('about');

Route::get('policy', 'PolicyController@index')->name('policy');

Route::get('policy_confirm', 'PolicyConfirmController@index')->name('policy_confirm');

// Route::get('home', 'HomeController@index')->name('home');

Route::get('product/detail/{id}', 'ProductDetailController@index')->name('detail');

Route::get('user/index', 'Admin\UserController@index')->name('user');
Route::get('user/edit', 'Admin\UserController@edit');
Route::post('user/edit', 'Admin\UserController@update');
Route::get('user/delete_account', 'Admin\UserController@show')->name('delete');
Route::get('user/destroy', 'Admin\UserController@destroy');

Route::get('changepassword', 'HomeController@showChangePasswordForm');
Route::post('changepassword', 'HomeController@changePassword')->name('changepassword');

Route::get('register_complete', 'RegisterCompleteController@index')->name('register_complete');
Route::get('register_complete_gmail', 'RegisterCompleteGmailController@index')->name('register_complete_gmail');

// googleのログイン認証
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
