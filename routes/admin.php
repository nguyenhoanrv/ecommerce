<?php

use Illuminate\Support\Facades\Route;

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
Route::namespace ('Admin')->group(function () {

    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login');
    Route::get('/register', 'Auth\RegisterController@showRegisterForm');
    Route::post('/register', 'Auth\RegisterController@register')->name('admin.register');

    Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin', 'web']], function () {
        Route::get('/', 'HomeController@root');
        Route::get('/home', 'HomeController@root')->name('admin.home');
        Route::get('/setting', 'AdminController@changePassword');
        Route::post('/change-password', 'AdminController@updatePassword')->name('admin.update.password');
        Route::get('{any}', 'HomeController@index');
    });
});