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

//Route::prefix('developer')->group(function() {
//    Route::get('/', 'DeveloperController@index');
//});

Route::group(['middleware' => ['auth']],function(){
    Route::resource('developer','DeveloperController');
    Route::prefix('developer')->group(function() {
        Route::post('/data', 'DeveloperController@data')->name('developer.data');
        Route::post('/changestatus/{id}', 'DeveloperController@changeStatus')->name('developer.changestatus');
    });
});

Route::group(['middleware' => ['auth']],function(){
    Route::resource('developergroup','DeveloperGroupController');
    Route::prefix('developergroup')->group(function() {
        Route::post('/data', 'DeveloperGroupController@data')->name('developergroup.data');

    });
});