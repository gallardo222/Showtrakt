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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@dashboard');

Route::get('/item/{tmdbId}/{mediaType}', 'ItemController@item');

Route::resource('items','ItemController')->middleware('auth');
Route::post('/watchlist', 'ItemController@store')->middleware('auth')->name('item.watchlist');
Route::resource('episodes','EpisodeController')->middleware('auth');
Route::get('/search', 'ItemController@search')->middleware('auth');
Route::get('/searched', 'ItemController@searchItem')->middleware('auth')->name('item.search');
Route::get('/profile', 'UserController@show')->middleware('auth')->name('profile.show');


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth','admin']
], function() {

    Route::get('/', 'AdminController@index')->name('dashboard');

    //Route::resource('posts', 'PostsController', ['except' => ['show', 'create'], 'as' => 'admin']);

    Route::resource('users', 'UsersController', ['as' => 'admin']);
    Route::get('/invite', 'UsersController@invite')->name('admin.users.invite');
    Route::post('/invite', 'UsersController@process_invites')->name('process_invite');

    Route::get('/post', 'PostController@index');
    Route::get('/post/create', 'PostController@create')->name('admin.posts.create');
    Route::post('/post/create', 'PostController@store')->name('admin.posts.store');
    Route::get('edit/{slug}', 'PostController@edit')->name('admin.posts.edit');
    Route::put('/post/update', 'PostController@update')->name('admin.posts.update');
    Route::delete('/post/delete/{post}', 'PostController@destroy')->name('admin.posts.destroy');
});

Route::get('/registration/{token}', 'UserController@registration_view')->name('registration');
Route::POST('/registration', 'Auth\RegisterController@register')->name('accept');

Route::get('/blog', 'PostController@index')->name('posts.index');
Route::get('/blog/{slug}', 'PostController@show');





