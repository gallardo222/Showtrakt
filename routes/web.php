<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@dashboard');

Route::get('/item/{tmdbId}/{mediaType}', 'ItemController@item');

Route::resource('items','ItemController')->middleware('auth');
Route::post('/watchlist', 'ItemController@store')->middleware('auth')->name('item.watchlist');
Route::resource('episodes','EpisodeController')->middleware('auth');
Route::get('/search', 'ItemController@search')->middleware('auth');
Route::get('/searched', 'ItemController@searchItem')->middleware('auth')->name('item.search');



