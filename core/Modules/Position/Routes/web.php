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

//Route::prefix('position')->group(function() {
//    Route::get('/', 'PositionController@index');
//});
Route::group(['middleware' => ['auth']],function(){

    Route::resource('position','PositionController');
    Route::prefix('position')->group(function() {
        Route::post('/data', 'PositionController@data')->name('position.data');
    });
});