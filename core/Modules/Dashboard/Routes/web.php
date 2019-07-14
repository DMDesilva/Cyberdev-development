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
	Route::prefix('/')->group(function() {
		Route::get('/', 'DashboardController@index');
		Route::get('/index', 'DashboardController@index');
		Route::post('/start', 'DashboardController@startWork');
		Route::post('/pause', 'DashboardController@pause');
		Route::post('/continue', 'DashboardController@continue');
		Route::post('/end', 'DashboardController@endWork');
		Route::post('/count', 'DashboardController@hours_count');
		Route::post('/workStatus', 'DashboardController@work_status');
		Route::get('/abc', 'DashboardController@new_dash');

	});
});