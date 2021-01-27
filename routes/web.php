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

Route::get('/oldguests', 'GuestController@oldguests');

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


//admin
Route::get('/admin', 'AdminController@index');

Route::get('/login', 'AuthController@login')->name('login');
Route::get('/loginadmin', 'AuthController@login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logoutadmin', 'AuthController@logout');

// Route::get('/guests/create', 'AdminController@create');
// Route::post('/guests', 'AdminController@store');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/guests/{id}/show', 'AdminController@show');
    Route::get('/guests/{id}/edit', 'AdminController@edit');
    Route::patch('/guests/{id}', 'AdminController@update');

    Route::get('/co/{id}/cek', 'AdminController@cek');
    Route::patch('/co/{id}', 'AdminController@cekout');

    Route::delete('/guests/{id}', 'AdminController@destroy');
    // Route::get('/exportguest','GuestController@guestexport');

    // Route::get('/search','GuestController@index');
    // Route::get('/guestexport','GuestController@index');
    // Route::get('/cetak','GuestPrint@pdf')->name('l_guest');

    // Route::get('/cetakguest/{search1}/{search2}','GuestController@cetakguest')->name('cetakguest');
    Route::get('/print_siswa','AdminController@print');

    Route::get('/penilaian/create', 'PenilaianController@create');
});

//sisi guest
Route::get('/indexutamaguest', 'TamuController@index');
Route::get('/checkin/create', 'TamuController@create');
Route::post('/checkin', 'TamuController@store');
Route::get('/indexcheckout', 'TamuController@indexcheckout');
Route::get('/checkin/{id}/edit', 'TamuController@edit');
Route::patch('/checkin/{id}', 'TamuController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
