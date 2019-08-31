<?php
Route::group(['prefix' => 'kepegawaian'], function () {
    
    Route::group(['prefix' => 'pegawai'], function () {
        
        Route::get('', 'PegawaiController@index')
            ->name('pegawai.index');

        Route::get('/create', 'PegawaiController@create')
            ->name('pegawai.create');

        Route::get('/store', 'PegawaiController@store')
            ->name('pegawai.store');

        Route::get('/ajax/data', 'PegawaiController@datatables')
            ->name('pegawai.ajax.data');
            
    });

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


});