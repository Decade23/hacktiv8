<?php

Route::group(['prefix' => 'kepegawaian'], function () {
    
    Route::group(['prefix' => 'jabatan'], function() {
        
        Route::get('', 'PegawaiController@index')
	        ->name('jabatan.index');

	    Route::get('/create', 'PegawaiController@create')
	        ->name('jabatan.create');

	    Route::get('/store', 'PegawaiController@store')
	        ->name('jabatan.store');

	    Route::get('/ajax/data', 'PegawaiController@datatables')
	        ->name('jabatan.ajax.data');
    });

    Route::group(['prefix' => 'pangkat'], function() {
        
        Route::get('', 'PegawaiController@index')
	        ->name('pangkat.index');

	    Route::get('/create', 'PegawaiController@create')
	        ->name('pangkat.create');

	    Route::get('/store', 'PegawaiController@store')
	        ->name('pangkat.store');

	    Route::get('/ajax/data', 'PegawaiController@datatables')
	        ->name('pangkat.ajax.data');
    });
    

});