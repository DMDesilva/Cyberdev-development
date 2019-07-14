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

Route::prefix('Developerpayment')->group(function() {
    Route::get('/', 'DeveloperPaymentController@index');
    Route::get('/savepaymentGenarate', 'GenaratemodelController@store');
});
