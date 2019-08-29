<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
	'prefix' => 'dashboard'
], function(){

	Route::get('/pegawai', 'PegawaiController@index')
	->name('dashboard.pegawai.index');

	Route::get('/pegawai/create', 'PegawaiController@store')
	->name('dashboard.pegawai.store');

	Route::get('/pegawai/update', 'PegawaiController@update')
	->name('dashboard.pegawai.update');

	Route::get('/pegawai/show', 'PegawaiController@show')
	->name('dashboard.pegawai.show');

});

Route::get('/login','LoginController@loginForm')->name('login');

Route::post('/login/proses','LoginController@loginFormProses');



Route::get('/', function() {
    //
});