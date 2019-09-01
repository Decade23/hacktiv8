<?php

Route::group(['prefix' => 'mutasi'], function () {
        
    Route::get('', 'PegawaiController@index')
        ->name('mutasi.index');

    Route::get('/create', 'PegawaiController@create')
        ->name('mutasi.create');

    Route::get('/store', 'PegawaiController@store')
        ->name('mutasi.store');

    Route::get('/ajax/data', 'PegawaiController@datatables')
        ->name('mutasi.ajax.data');
        
});