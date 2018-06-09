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
Route::resource('user', 'UserController');

Route::get('profile/{id}/edit', 'StudentController@edit')->middleware('auth');
Route::get('profile/{id}/portfolio/{portfoio_id}', 'PortfolioController@getportfolio')->name('getportfolio');
Route::resource('profile', 'StudentController');
Route::resource('portfolio', 'PortfolioController');
Route::resource('myjobs', 'MyJobController')->middleware('auth','role:student');;



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
Route::delete('inbox/{id}/delete','MessageController@delete')->name('deletemessage')->middleware('auth');;
Route::get('inbox/{id}','MessageController@detail')->name('showmessage');
Route::get('inbox/{id}/giveto/{user_id}','PostingController@givetouser')->name('givetouser')->middleware('auth','role:company');
Route::get('inbox/{id}/roundup/{posting_id}','PostingController@roundup')->name('roundup')->middleware('auth','role:company');
Route::get('messages/{id}', 'MessageController@fetchMessages');
Route::post('messages/{id}', 'MessageController@sendMessage');

Route::resource('rating', 'RatingController')->middleware('auth');
Route::get('rating/{posting_id}/{student_id}','RatingController@StudentRating')->name('giveRating')->middleware('auth');
Route::post('rating/{posting_id}/{student_id}/store','RatingController@storestudentrating')->name('storestudentrating')->middleware('auth','role:company');
Route::post('rating/{posting_id}/{company_id}/storecompany','RatingController@storecompanyrating')->name('storecompanyrating')->middleware('auth','role:student');