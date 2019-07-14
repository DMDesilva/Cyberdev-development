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

Route::prefix('rolemanagement')->group(function() {
    Route::get('/', 'RoleManagementController@index');
    Route::post('/data', 'RoleManagementController@data')->name('rolemanagement.data');
    Route::get('/create', 'RoleManagementController@create');
    Route::post('/store', 'RoleManagementController@store');
    Route::put('/update/{id}','RoleManagementController@update');
    
});
Route::resource('rolemanagement','RoleManagementController');
Route::get('/tableview', 'RoleManagementController@tableview');
});