<?php

use App\Models\Product;
use App\Models\Wishlist;
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
})->name('wellcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Wishlist
Route::get('/wishlist', 'WishlistController@index')->middleware('auth')->name('wishlist');
Route::delete('/wishlist/delete/{id}', 'WishlistController@delete');
Route::post('/wishlist/store', 'WishlistController@store');

//Product 
Route::get('/product/get/{id}', function ($id) {
    $product = Product::with('brand:id,brand_name')->findOrFail($id);
    return response()->json([
        'product' => $product
    ]);
});
Route::get('/admin', 'Admin\HomeController@root');
Route::get('{any}', 'HomeController@index');