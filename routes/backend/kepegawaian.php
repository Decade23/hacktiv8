<?php

Route::group(['prefix' => 'kepegawaian'], function () {
    
    Route::group(['prefix' => 'jabatan'], function() {
        
	    Route::get('', 'JabatanController@index')
	        ->name('kepegawaian.jabatan.index');

	    Route::get('/create', 'JabatanController@create')
	        ->name('kepegawaian.jabatan.create');

	    Route::get('/update/{id}', 'JabatanController@update')
	        ->name('kepegawaian.jabatan.update');

	    Route::get('/show/{id}', 'JabatanController@show')
	        ->name('kepegawaian.jabatan.show');

	    Route::put('/update/{id}/edit', 'JabatanController@edit')
	        ->name('kepegawaian.jabatan.edit');            

	    Route::delete('/delete', 'JabatanController@delete')
	        ->name('kepegawaian.jabatan.delete');

	    Route::post('/store', 'JabatanController@store')
	        ->name('kepegawaian.jabatan.store');

	    Route::get('/ajax/data', 'JabatanController@datatables')
	        ->name('kepegawaian.jabatan.ajax.data');

	    Route::get('/ajax/data/select2', 'JabatanController@select2')
	        ->name('kepegawaian.jabatan.ajax.select2');
    });

    Route::group(['prefix' => 'pangkat'], function() {
        
        Route::get('', 'PangkatController@index')
        ->name('kepegawaian.pangkat.index');

	    Route::get('/create', 'PangkatController@create')
	        ->name('kepegawaian.pangkat.create');

	    Route::get('/update/{id}', 'PangkatController@update')
	        ->name('kepegawaian.pangkat.update');

	    Route::get('/show/{id}', 'PangkatController@show')
	        ->name('kepegawaian.pangkat.show');

	    Route::put('/update/{id}/edit', 'PangkatController@edit')
	        ->name('kepegawaian.pangkat.edit');            

	    Route::delete('/delete', 'PangkatController@delete')
	        ->name('kepegawaian.pangkat.delete');

	    Route::post('/store', 'PangkatController@store')
	        ->name('kepegawaian.pangkat.store');

	    Route::get('/ajax/data', 'PangkatController@datatables')
	        ->name('kepegawaian.pangkat.ajax.data');

	    Route::get('/ajax/data/select2', 'PangkatController@select2')
	        ->name('kepegawaian.pangkat.ajax.select2');
    });
    

});