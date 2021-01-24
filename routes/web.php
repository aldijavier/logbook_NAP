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

Route::get('/', 'GuestController@index' );
Route::get('/guests/checkout', 'GuestController@checkout');
Route::get('/guests/searchresult', 'GuestController@search');

Route::get('/guests/create', 'GuestController@store' );

Route::get('/guests/cekout', 'GuestController@cekout');
Route::get('/guests/success', 'GuestController@success');
Route::get('/guests/rating', 'GuestController@rating');
Route::get('/guests/chooseuser', 'GuestController@chooseuser');
Route::get('/guests/getGuest', 'GuestController@getGuest');
Route::get('/guests/oldGuests', 'GuestController@oldGuests');
Route::get('/guests/guestId', 'GuestController@guestsId');
// Route::patch('/co/{id}', 'GuestController@cekout');
Route::resource('/guests', 'GuestController');
//cari tamu
Route::any( '/guests/search', 'GuestController@search');
Route::any( '/guests/searchGuest', 'GuestController@searchGuest');
Route::get( '/guests/cekout', 'GuestController@cekout');
