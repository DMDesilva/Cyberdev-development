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


Route::group(['middleware' => ['auth']],function(){

	Route::resource('deadline','DeadlineController');
	Route::prefix('/deadline')->group(function() {
     // Route::get('/', 'ClientController@index')->name('client.index');
		Route::post('/data', 'DeadlineController@data')->name('deadline.data');
	});
});





