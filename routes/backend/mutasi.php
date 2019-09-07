<?php

Route::group(['prefix' => 'mutasi'], function () {
        
    Route::get('', 'MutasiController@index')
        ->name('mutasi.index');

    Route::get('/create', 'MutasiController@create')
        ->name('mutasi.create');

    Route::get('/update/{id}', 'MutasiController@update')
        ->name('mutasi.update');

    Route::get('/show/{id}', 'MutasiController@show')
        ->name('mutasi.show');

    Route::put('/update/{id}/edit', 'MutasiController@edit')
        ->name('mutasi.edit');            

    Route::delete('/delete', 'MutasiController@delete')
        ->name('mutasi.delete');

    Route::post('/store', 'MutasiController@store')
        ->name('mutasi.store');

    Route::get('/ajax/data', 'MutasiController@datatables')
        ->name('mutasi.ajax.data');

    Route::get('/ajax/data/select2', 'MutasiController@select2')
        ->name('mutasi.ajax.select2');
        
});