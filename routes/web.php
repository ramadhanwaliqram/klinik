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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/admin', 'AdminController@index')->name('index');
        Route::post('/dokter', "DokterController@store")->name("dokter-add");
        Route::delete('/dokter', "DokterController@destroy")->name("dokter-delete");
        Route::put('/dokter', "DokterController@update")->name("dokter-edit");

});

    Route::namespace('Dokter')
    ->name('dokter.')
    ->middleware(['auth', 'dokter'])
    ->group(function () {
        Route::get('/dokter', 'DokterController@index')
            ->name('dokter');
        
});

Route::namespace('Pasien')
    ->name('pasien.')
    ->middleware(['auth', 'pasien'])
    ->group(function () {
        Route::get('/pasien', 'PasienController@index')
            ->name('pasien');

});

//sidebar admin
Route::get('/rekam-medis', 'RekamMedisController@index')->name('rekam-medis');
Route::get('/apotek', 'ObatController@index')->name('apotek');
Route::get('/konsultasi', 'KonsultasiController@index')->name('konsultasi');
Route::get('/tagihan', 'ObatController@index')->name('tagihan');






// Route::get('/dokter', 'DokterController@index')->name('dokter');
