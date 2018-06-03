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

Route::resource('/', 'HomeController');
Route::resource('', 'HomeController');

Route::get('profile/{id}/edit', 'StudentController@edit')->middleware('auth');
Route::resource('profile', 'StudentController');



Route::resource('company', 'CompanyController');
Route::resource('jobs', 'PostingController');

Route::get('jobs/create', 'PostingController@create')->middleware('auth','role:company');

Route::resource('favorite', 'FavoriteController');

Route::post('/favoritejob', 'FavoriteController@addToFave')->name('favoritejob');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('inbox','MessageController@index');
Route::get('messages', 'MessageController@fetchMessages');
Route::post('messages', 'MessageController@sendMessage');