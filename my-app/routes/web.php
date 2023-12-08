<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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
//認証
Auth::routes();
//ログイン後のトップページ
Route::get('/home', 'App\Http\Controllers\ShopController@index')->name('shop.index')->middleware('auth');
//トップページ
Route::get('/', 'App\Http\Controllers\HomeController@index');
//自分のカート（認証あり）
Route::get('/mycart', 'App\Http\Controllers\ShopController@myCart')->middleware('auth');
//カートに入れる（認証あり）
Route::post('/mycart', 'App\Http\Controllers\ShopController@addMycart')->middleware('auth');
//カートから削除
Route::POST('/cartdelete','App\Http\Controllers\ShopController@deleteCart');
//ログアウト
Route::post('/checkout', 'App\Http\Controllers\ShopController@checkout');
//ログイン
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@authenticate');
//入力フォームページ
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('index');
//確認フォームページ
Route::post('/contact/confirm', 'App\Http\Controllers\ContactController@confirm')->name('confirm');
//送信完了ページ
Route::post('/contact/thanks', 'App\Http\Controllers\ContactController@send')->name('send');
// コメント一覧画面
Route::get('/comments', 'App\Http\Controllers\CommentController@index')->name('comments.index');
// コメント投稿画面
Route::get('/comments/create', 'App\Http\Controllers\CommentController@showCreateForm')->name('comments.create');
// コメント投稿実行
Route::post('/comments/create', 'App\Http\Controllers\CommentController@create');
//クリックジャッキングのページ
Route::get('/click', 'App\Http\Controllers\HelloWorldController@index');
//Csrfの罠ページ
Route::get('/csrf', 'App\Http\Controllers\CsrfController@index');
Route::get('/photo', 'App\Http\Controllers\CsrfController@photo');