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

Route::get('/', 'HomeController@index');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/home', 'HomeController@index');
    Route::group(['prefix' => 'ref'], function (){
        Route::get('fakultas', 'ReferensiController@showFakultas')->name('ref.fakultas');
        Route::post('getfakultas', 'ReferensiController@getFakultas')->name('ref.getfakultas');
        Route::get('fakultasdata', 'ReferensiController@fakultasData')->name('ref.fakultasdata');

        Route::get('jurusan', 'ReferensiController@showJurusan')->name('ref.jurusan');
        Route::post('getjurusan', 'ReferensiController@getJurusan')->name('ref.getjurusan');
        Route::get('jurusandata', 'ReferensiController@jurusanData')->name('ref.jurusandata');

        Route::get('prodi', 'ReferensiController@showProdi')->name('ref.prodi');
        Route::post('getprodi', 'ReferensiController@getProdi')->name('ref.getprodi');
        Route::get('prodidata', 'ReferensiController@prodiData')->name('ref.prodidata');

        Route::get('akreditasi', 'ReferensiController@showAkreditasi')->name('ref.akreditasi');
        Route::post('getakreditasi', 'ReferensiController@getAkreditasi')->name('ref.getakreditasi');
        Route::get('akreditasidata', 'ReferensiController@akreditasiData')->name('ref.akreditasidata');

        Route::get('kelas', 'ReferensiController@showKelas')->name('ref.kelas');
        Route::post('getkelas', 'ReferensiController@getKelas')->name('ref.getkelas');
        Route::get('kelasdata', 'ReferensiController@kelasData')->name('ref.kelasdata');

        Route::get('jenisakun', 'ReferensiController@showJenisAkun')->name('ref.jenisakun');
        Route::post('getjenisakun', 'ReferensiController@getJenisAkun')->name('ref.getjenisakun');
        Route::get('jenisakundata', 'ReferensiController@jenisAkunData')->name('ref.jenisakundata');

        Route::get('jenisrekening', 'ReferensiController@showJenisRekening')->name('ref.jenisrekening');
        Route::post('getjenisrekening', 'ReferensiController@getJenisrekening')->name('ref.getjenisrekening');
        Route::get('jenisrekeningdata', 'ReferensiController@jenisRekeningData')->name('ref.jenisrekeningdata');
    });

    Route::resource('layanan', 'LayananController');
    Route::get('layanandata', 'LayananController@layananData')->name('layanan.data');

    Route::resource('penerimaan', 'AkunPenerimaanController');
    Route::resource('pengeluaran', 'AkunPengeluaranController');
    Route::resource('saldo', 'SaldoController');

    Route::resource('user', 'UserController');
    Route::get('userdata', 'UserController@userData')->name('user.userdata');
});
