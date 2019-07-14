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

//Route::prefix('project')->group(function() {
//    Route::get('/', 'ProjectController@index');
//});
Route::group(['middleware' => ['auth']],function(){

    Route::resource('project','ProjectController');
    Route::prefix('project')->group(function() {
        Route::post('/data', 'ProjectController@data')->name('project.data');
        Route::get('client/project/{id}', 'ProjectController@removeClient')->name('client.project.delete');
    });
});