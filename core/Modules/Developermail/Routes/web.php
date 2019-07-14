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

//Route::prefix('developermail')->group(function() {
//    Route::get('/', 'DevelopermailController@index');
//});

Route::group(['middleware' => ['auth']],function(){
    Route::resource('developermail','DevelopermailController');
    Route::prefix('developermail')->group(function() {
        // Route::get('/', 'ServiceController@index');
        Route::post('/data', 'DevelopermailController@data')->name('developermail.data');
    });
});

Route::get('/send-queued-developer-emails', 'DevelopermailController@sendQueuedMail');