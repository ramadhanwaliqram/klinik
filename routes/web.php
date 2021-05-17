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

//sidebar admin
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/data-pasien', 'DataPasienController@index')->name('data-pasien');
Route::get('/data-dokter', 'DataDokterController@index')->name('data-dokter');
Route::get('/data-obat', 'DataObatController@index')->name('data-obat');
Route::get('/data-jadwal', 'JadwalController@index')->name('data-jadwal');



Route::get('/dokter', 'DokterController@index')->name('dokter');
