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

//Route::resource('position','PositionController');
// Route::group(['middleware'=>['auth']],function(){

Route::group(['middleware' => ['auth']],function(){

Route::prefix('permisionmanagement')->group(function() {
    Route::get('/', 'PermisionManagementController@index');
    Route::post('/data', 'PermisionManagementController@data')->name('permisionmanagement.data');
    Route::post('/store', 'PermisionManagementController@store');
    Route::put('/update/{id}', 'PermisionManagementController@update');
    Route::get('/create', 'PermisionManagementController@create');
    Route::get('/tableview2', 'PermisionManagementController@tableview2');
  	

});
Route::resource('permisionmanagement','PermisionManagementController');


}); 


// });
