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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('sites', 'SiteController');

//Route::get('/', 'Admin\SiteController@index');
/*Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\LoginController@showLoginForm');
});*/

/*Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    //Route::get('/', 'Admin\SiteController@index');
    //Auth::routes();
    //Route::get('/', 'Admin\LoginController@showLoginForm');
    Route::resource('sites', 'Admin\SiteController');
});*/
