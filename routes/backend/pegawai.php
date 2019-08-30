<?php
Route::group(['prefix' => 'kepegawaian'], function () {
    Route::group(['prefix' => 'pegawai'], function () {
        Route::get('/list', 'PegawaiController@index')
            ->name('pegawai.index');
    });
});