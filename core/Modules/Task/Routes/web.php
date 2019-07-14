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

Route::group(['middleware'=>['auth']],function(){

	Route::resource('task','TaskController');
	Route::prefix('/task')->group(function(){
		
		Route::post('/data', 'TaskController@data')->name('task.data');
		// Route::post('/assign','AssignController@assign_show');

		//Route::post('/assign', 'AssignController@assign_show')->name('assign_show.store');
		
		// Route::post('/assign', 'AssignController@store');
		Route::post('/assign', 'AssignController@assign_show');

		Route::post('/assign/insert', 'AssignController@assign_insert');

		Route::post('/editShow', 'TaskController@taskShow');
		
		Route::post('/update', 'TaskController@update');
                
                
	});

	Route::get('/test', 'TaskController@test');	
	
});



