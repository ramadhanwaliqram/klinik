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
})->name('depan');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/admin', 'AdminController@index')->name('index');
        Route::post('/dokter', "DokterController@store")->name("dokter-add");
        Route::get('/dokter/{dokter_id}', "DokterController@show")->name("show-dokter");
        Route::post('/edit-dokter', "DokterController@update")->name("edit-dokter");
        Route::get('/delete-dokter/{dokter_id}', "DokterController@destroy")->name("edit-dokter");

        Route::get('/data-pasien', 'DataPasienController@index')->name('data-pasien');
        Route::get('/data-dokter', 'DataDokterController@index')->name('data-dokter');
        Route::get('/data-obat', 'DataObatController@index')->name('data-obat');
        Route::get('/data-jadwal', 'DataJadwalController@index')->name('data-jadwal');

});

Route::namespace('Dokter')
    ->name('dokter.')
    ->middleware(['auth', 'dokter'])
    ->group(function () {
        Route::get('/dokter', 'DokterController@index')
            ->name('dokter');
        Route::get('/rekam-medis-dokter','RekamMedikDokterController@index')->name('rekam-medis');
        Route::get('/jadwal-dokter','JadwalDokterController@index')->name('jadwal-dokter');
        Route::get('/konsultasi-dokter', 'KonsultasiDokterController@index')->name('konsultasi-dokter');
        Route::get('/konsul/{pasien_id}', 'KonsultasiDokterController@show')->name('chat');
        Route::post('/konsul/{pasien_id}', 'KonsultasiDokterController@store')->name('send-konsul');
});

Route::namespace('Pasien')
    ->name('pasien.')
    ->middleware(['auth', 'pasien'])
    ->group(function () {
        Route::get('/pasien', 'PasienController@index')
            ->name('pasien');


        });

Route::resource('konsultasi', 'KonsultasiController');

//sidebar admin
Route::get('/rekam-medis', 'RekamMedisController@index')->name('rekam-medis');
Route::get('/apotek', 'ObatController@index')->name('apotek');
Route::get('/konsultasi', 'KonsultasiController@index')->name('konsultasi');
Route::get('/tagihan', 'TagihanController@index')->name('tagihan');

// Route::get('/dokter', 'DokterController@index')->name('dokter');
