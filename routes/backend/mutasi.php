<?php

Route::group(['prefix' => 'mutasi'], function () {
        
    Route::get('', 'MutasiController@index')
        ->name('mutasi.index');

    Route::get('/create', 'MutasiController@create')
        ->name('mutasi.create');

    Route::get('/store', 'MutasiController@store')
        ->name('mutasi.store');

    Route::get('/ajax/data', 'MutasiController@datatables')
        ->name('mutasi.ajax.data');
        
});