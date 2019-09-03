<?php

Route::group(['prefix' => 'pegawai'], function () {
    
    Route::get('', 'PegawaiController@index')
        ->name('pegawai.index');

    Route::get('/create', 'PegawaiController@create')
        ->name('pegawai.create');

    Route::get('/store', 'PegawaiController@store')
        ->name('pegawai.store');

    Route::get('/ajax/data', 'PegawaiController@datatables')
        ->name('pegawai.ajax.data');

    Route::get('/ajax/data/select2', 'PegawaiController@select2')
        ->name('pegawai.ajax.select2');
            
});