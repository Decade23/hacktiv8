<?php

Route::group(['prefix' => 'riwayat-pendidikan'], function () {
        
    Route::get('', 'RiwayatController@index')
        ->name('riwayat_pendidikan.index');

    Route::get('/create', 'RiwayatController@create')
        ->name('riwayat_pendidikan.create');

    Route::get('/store', 'RiwayatController@store')
        ->name('riwayat_pendidikan.store');

    Route::get('/ajax/data', 'RiwayatController@datatables')
        ->name('riwayat_pendidikan.ajax.data');
        
});