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
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'MarketController@index')->name('home');
Route::resource('markets', 'MarketController');
Route::resource('farms', 'FarmController');

// blog resource
Route::resource('blog', 'PostController', [ 'except' => [ 'show' ] ]);
Route::get('blog/{id}/delete/', [ 'as' => 'blog.delete', 'uses' => 'PostController@delete' ]);
Route::get('blog/{post}', [ 'as' => 'blog.show', 'uses' => 'PostController@show' ]);

// season resource
Route::get('season/{season}/delete', 'SeasonController@delete')->name('season.delete');
Route::resource('season', 'SeasonController');

// season resource
Route::resource('game', 'GameController');

// dashboard
Route::get('dashboard',function(){
	return view('layouts.dashboard');
})->name('dashboard');


Route::get('register','RegistrationController@create')->name('register');
Route::post('register','RegistrationController@store')->name('register.store');
Route::get('login','SessionController@create')->name('login');
Route::post('login','SessionController@store')->name('login.store');
Route::get('logout','SessionController@destroy')->name('logout');

// links resource
Route::get('links', 'LinkController@index')->name('links');
Route::post('links', 'LinkController@store')->name('links.store');
Route::delete('links/{link}', 'LinkController@destroy')->name('links.destroy');
Route::get('{link}', 'LinkController@processHash')->name('links.hash')->where('link','[0-9a-zA-Z]{6}');
