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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontendController@main')->name('mainpage');

Route::get('itemdetail/{id}', 'FrontendController@itemdetail')->name('itemdetail')->middleware('auth');

Route::get('cart', 'FrontendController@cart')->name('cartpage');

Route::get('signin','FrontendController@signin')->name('signinpage');

Route::get('signup','FrontendController@signup')->name('signuppage');

Route::middleware('role:admin')->group(function () {
	// backend
	Route::resource('brands', 'BrandController');
	Route::resource('categories', 'CategoryController');
	Route::resource('subcategories', 'SubcategoryController');
	Route::resource('items', 'ItemController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('orders','OrderController');