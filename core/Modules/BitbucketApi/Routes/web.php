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

Route::prefix('bitbucketapi')->group(function() {
    Route::get('/bitbucketClone', 'BitbucketApiController@bitbucketClone');
    Route::get('/cloneRepositories', 'RepositoryController@cloneRepositories');
    
    Route::resource('repository', 'RepositoryController');
});
