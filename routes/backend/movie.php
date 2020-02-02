<?php

Route::group(['prefix' => 'movie'], function () {

    Route::get('', 'MovieController@index')
        ->name('movie.index');

    Route::get('/create', 'MovieController@create')
        ->name('movie.create');

    Route::get('/update/{id}', 'MovieController@update')
        ->name('movie.update');

    Route::get('/show/{id}', 'MovieController@show')
        ->name('movie.show');

    Route::put('/update/{id}/edit', 'MovieController@edit')
        ->name('movie.edit');

    Route::delete('/delete', 'MovieController@delete')
        ->name('movie.delete');

    Route::post('/store', 'MovieController@store')
        ->name('movie.store');

    Route::get('/ajax/data', 'MovieController@datatables')
        ->name('movie.ajax.data');

    Route::get('/ajax/data/select2', 'MovieController@select2')
        ->name('movie.ajax.select2');

});