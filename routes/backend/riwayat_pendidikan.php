<?php

Route::group(['prefix' => 'riwayat-pendidikan'], function () {
        
    Route::get('', 'RiwayatController@index')
        ->name('riwayat_pendidikan.index');

    Route::get('/create', 'RiwayatController@create')
        ->name('riwayat_pendidikan.create');

    Route::get('/update/{id}', 'RiwayatController@update')
        ->name('riwayat_pendidikan.update');

    Route::get('/show/{id}', 'RiwayatController@show')
        ->name('riwayat_pendidikan.show');

    Route::put('/update/{id}/edit', 'RiwayatController@edit')
        ->name('riwayat_pendidikan.edit');            

    Route::delete('/delete', 'RiwayatController@delete')
        ->name('riwayat_pendidikan.delete');

    Route::post('/store', 'RiwayatController@store')
        ->name('riwayat_pendidikan.store');

    Route::get('/ajax/data', 'RiwayatController@datatables')
        ->name('riwayat_pendidikan.ajax.data');

    Route::get('/ajax/data/select2', 'RiwayatController@select2')
        ->name('riwayat_pendidikan.ajax.select2');
        
});