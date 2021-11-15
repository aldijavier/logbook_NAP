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

Route::get('/', 'GuestController@index' )->name('index');
Route::get('/guests/checkout', 'GuestController@checkout')->name('checkout');
Route::get('/guests/searchresult', 'GuestController@search')->name('searchresult');

Route::get('/redirect-logbook/{q}', 'Auth\AuthController@login');

Route::get('/guests/create', 'GuestController@store')->name('Store');

Route::get('/oldguests', 'GuestController@oldguests');

// Route::get('/', 'Auth\AuthController@index')->name('login');

Route::get('/guests/cekout', 'GuestController@cekout');
Route::get('/guests/success', 'GuestController@success');
Route::get('/guests/rating', 'GuestController@rating');
Route::get('/guests/chooseuser', 'GuestController@chooseuser')->name('chooseuser');
Route::get('/guests/getGuest', 'GuestController@getGuest')->name('getGuest');
Route::get('/guests/oldGuests', 'GuestController@oldGuests');
Route::get('/guests/guestId', 'GuestController@guestsId');
// Route::patch('/co/{id}', 'GuestController@cekout');
Route::resource('/guests', 'GuestController');
// Route::resource('/guests', 'GuestCheckinController');
//cari tamu
Route::any( '/guests/search', 'GuestController@search')->name('search');
Route::any( '/guests/searchGuest', 'GuestController@searchGuest')->name('searchGuest');
Route::get( '/guests/cekout', 'GuestController@cekout');

Route::get('/getLantai/{id}', 'LokasiController@getLantai');


// Route::get('/guests/logbook', 'GuestController@lokasi');
Route::get('/json-lantai', 'GuestController@lantai')->name('jsonLantai');
Route::get('/json-ruangan', 'GuestController@ruangan')->name('jsonRuang');

//Export
Route::get('/tickets/rfo/{id}', 'App\Http\Controllers\ExportController@rfo')->middleware(['checkRole:Super Admin,User,Customer Care,BOD']);
Route::get('/tickets/rfo_maintenance/{id}', 'App\Http\Controllers\ExportController@rfoMaintenance')->middleware(['checkRole:Super Admin,User,Customer Care,BOD']);
Route::post('/tickets/export', 'ExportController@export');
Route::post('/tickets/exportkeluar', 'ExportController@exportkeluar');
Route::post('/tickets/exportreturn', 'ExportController@exportreturn');
Route::post('/tickets/exportLogAssign', 'App\Http\Controllers\ExportController@exportLogAssign')->middleware(['checkRole:Super Admin,User,Customer Care,BOD']);
Route::post('/tickets_internal/exportLogAssign', 'App\Http\Controllers\ExportController@exportLogAssign')->middleware(['checkRole:Super Admin,User,Customer Care,BOD']);
Route::post('/tickets/export-bulk-Assign', 'App\Http\Controllers\ExportController@exportBulkAssign')->middleware(['checkRole:Super Admin,User,Customer Care,BOD']);
//End export
//admin
// Route::get('/admin', 'AdminController@index')->name('admin');

// Route::get('/login', 'AuthController@login')->name('login');
// Route::get('/loginadmin', 'AuthController@login')->name('loginadmin');
// Route::post('/postlogin', 'AuthController@postlogin')->name('postlogin');
// Route::get('/logoutadmin', 'AuthController@logout')->name('logoutadmin');
// Route::get('/logout', 'AuthController@logout')->name('logout');
// Route::get('/guests/create', 'AdminController@create');
// Route::post('/guests', 'AdminController@store');

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/admin', 'AdminController@index')->name('admin');
//     Route::get('/guests/{id}/show', 'AdminController@show');
//     Route::get('/guests/{id}/edit', 'AdminController@edit');
//     Route::patch('/guests/{id}', 'AdminController@update');

//     Route::get('/co/{id}/cek', 'AdminController@cek');
//     Route::patch('/co/{id}', 'AdminController@cekout');

//     Route::delete('/guests/{id}', 'AdminController@destroy');
//     Route::get('/exportguest','GuestController@guestexport');

//     Route::get('/search','GuestController@index');
//     Route::get('/guestexport','GuestController@index');
//     Route::get('/cetak','GuestPrint@pdf')->name('l_guest');

//     Route::get('/cetakguest/{search1}/{search2}','GuestController@cetakguest')->name('cetakguest');
//     Route::get('/print_siswa','AdminController@print');

//     Route::get('/penilaian/create', 'PenilaianController@create');
// });

//sisi guest
Route::get('/indexutamaguest', 'TamuController@index');
Route::get('/checkin/create', 'TamuController@create');
Route::post('/checkin', 'TamuController@store');
Route::get('/indexcheckout', 'TamuController@indexcheckout');
Route::get('/checkin/{id}/edit', 'TamuController@edit');
Route::patch('/checkin/{id}', 'TamuController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'Auth\AuthController@index')->name('login');
Route::get('/admin', 'Auth\AuthController@sso')->name('login_awal');
Route::post('/login', 'Auth\AuthController@login')->name('logins');
Route::get('/logoutadmin', 'Auth\AuthController@logout')->name('logoutadmin');
Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth', 'ceklevel:Super Admin'], function(){
    Route::get('/admin', 'Auth\AuthController@index')->name('admin');
    Route::get('/audit', 'AuditLogController@index')->name('audit');
    Route::get('/guests/{id}/show', 'AdminController@show');
    Route::get('/guests/{id}/edit', 'AdminController@edit');
    Route::patch('/guests/{id}', 'AdminController@update');

    Route::get('/co/{id}/cek', 'AdminController@cek');
    Route::patch('/co/{id}', 'AdminController@cekout');

    Route::delete('/guests/{id}', 'AdminController@destroy');
    Route::get('/exportguest','GuestController@guestexport');

    Route::get('/search','GuestController@index');
    Route::get('/guestexport','GuestController@index');
    Route::get('/cetak','GuestPrint@pdf')->name('l_guest');

    Route::get('/cetakguest/{search1}/{search2}','GuestController@cetakguest')->name('cetakguest');
    Route::get('/print_siswa','AdminController@print');

    Route::get('/penilaian/create', 'PenilaianController@create');
});

Route::group(['middleware' => 'auth', 'ceklevel:Admin,User'], function(){
    Route::get('/admin', 'Auth\AuthController@index')->name('admin');
    Route::get('/guests/{id}/show', 'AdminController@show');
    Route::get('/guests/{id}/edit', 'AdminController@edit');
    Route::patch('/guests/{id}', 'AdminController@update');

    Route::get('/co/{id}/cek', 'AdminController@cek');
    Route::patch('/co/{id}', 'AdminController@cekout');

    Route::delete('/guests/{id}', 'AdminController@destroy');
    Route::get('/search','GuestController@index');
    Route::get('/exportguest','GuestController@guestexport');

    Route::get('/search','GuestController@index');
    Route::get('/guestexport','GuestController@index');
    Route::get('/cetak','GuestPrint@pdf')->name('l_guest');

    Route::get('/cetakguest/{search1}/{search2}','GuestController@cetakguest')->name('cetakguest');
    Route::get('/print_siswa','AdminController@print');

    Route::get('/penilaian/create', 'PenilaianController@create');
});