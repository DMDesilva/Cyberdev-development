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

//Route::prefix('mailtype')->group(function() {
//    Route::get('/', 'MailTypeController@index');
//});

Route::group(['middleware' => ['auth']],function(){

    Route::resource('mailtype','MailTypeController');
    Route::prefix('mailtype')->group(function() {
        Route::post('/data', 'MailTypeController@data')->name('mailtype.data');
    });
});