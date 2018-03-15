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
Route::get('links', 'LinkController@index')->name('links');
Route::post('links', 'LinkController@store')->name('links.store');
Route::delete('links/{link}', 'LinkController@destroy')->name('links.destroy');
Route::get('{link}', 'LinkController@processHash')->name('links.hash')->where('link','[0-9a-zA-Z]{6}');