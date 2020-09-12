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

// Route::get('home', 'HomeController@index')->name('home');

Route::get('product/detail', 'ProductDetailController@index')->name('detail');

Route::get('user/index', 'AppUserController@index');


