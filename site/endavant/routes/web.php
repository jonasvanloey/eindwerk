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
Route::get('jobs/{id}/apply', 'PostingController@showapply')->name('showapply');
Route::post('jobs/{id}/apply/store', 'PostingController@storeapply')->name('storeapply');

Route::get('jobs/create', 'PostingController@create')->middleware('auth','role:company');

Route::resource('favorite', 'FavoriteController');

Route::post('/favoritejob', 'FavoriteController@addToFave')->name('favoritejob');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('inbox','MessageController@index');
Route::get('inbox/{id}','MessageController@detail')->name('showmessage');
Route::get('inbox/{id}/giveto/{user_id}','PostingController@givetouser')->name('givetouser')->middleware('auth','role:company');
Route::get('inbox/{id}/roundup/{posting_id}','PostingController@roundup')->name('roundup')->middleware('auth','role:company');
Route::get('messages/{id}', 'MessageController@fetchMessages');
Route::post('messages/{id}', 'MessageController@sendMessage');