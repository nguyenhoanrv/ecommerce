<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Wishlist

Route::post('/wishlist/store', 'WishlistController@store');

//Product 
Route::get('/product/get/{id}', function ($id) {
    $product = Product::findOrFail($id);
    return response()->json([
        'product' => $product
    ]);
});
Route::get('/admin', 'Admin\HomeController@root');
Route::get('{any}', 'HomeController@index');