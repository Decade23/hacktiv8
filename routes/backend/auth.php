<?php


Route::group(['prefix' => 'auth'], function() {
    
    Route::get('login', 'AuthController@showFormLogin')
    ->name('login')->middleware('guest');

    Route::post('login/process', 'AuthController@processLogin')
    ->name('login.process');

    Route::get('logout', 'AuthController@logout')
    ->name('logout');
    
});