<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
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
Route::get('helloworld', 'App\Http\Controllers\HelloWorldController@index');
Auth::routes();
Route::get('/', 'App\Http\Controllers\ShopController@index');
Route::get('/mycart', 'App\Http\Controllers\ShopController@myCart')->middleware('auth');
Route::post('/mycart', 'App\Http\Controllers\ShopController@addMycart');
Route::POST('/cartdelete','App\Http\Controllers\ShopController@deleteCart');
Route::post('/checkout', 'App\Http\Controllers\ShopController@checkout');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@authenticate');