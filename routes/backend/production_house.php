<?php

Route::group(['prefix' => 'production-house'], function () {
        
    Route::get('', 'ProductionHouseController@index')
        ->name('production_house.index');

    Route::get('/create', 'ProductionHouseController@create')
        ->name('production_house.create');

    Route::get('/update/{id}', 'ProductionHouseController@update')
        ->name('production_house.update');

    Route::get('/show/{id}', 'ProductionHouseController@show')
        ->name('production_house.show');

    Route::put('/update/{id}/edit', 'ProductionHouseController@edit')
        ->name('production_house.edit');            

    Route::delete('/delete', 'ProductionHouseController@delete')
        ->name('production_house.delete');

    Route::post('/store', 'ProductionHouseController@store')
        ->name('production_house.store');

    Route::get('/ajax/data', 'ProductionHouseController@datatables')
        ->name('production_house.ajax.data');

    Route::get('/ajax/data/select2', 'ProductionHouseController@select2')
        ->name('production_house.ajax.select2');
        
});