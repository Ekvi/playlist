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

Route::get('/sites/{id}/categories', 'CategoryController@index');
Route::get('/categories/create/{site_id}', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');
Route::get('/categories/{id}/edit', 'CategoryController@edit');
Route::put('/categories/{id}', 'CategoryController@update');
Route::delete('/categories/{id}', 'CategoryController@destroy');

Route::get('/categories/{id}/sections', 'SectionController@index');
Route::get('/sections/create/{category_id}', 'SectionController@create');
Route::post('/sections', 'SectionController@store');
Route::get('/sections/{id}/edit', 'SectionController@edit');
Route::put('/sections/{id}', 'SectionController@update');
Route::delete('/sections/{id}', 'SectionController@destroy');

Route::get('/playlist', 'PlayListController@playlist');
Route::get('/film', 'PlayListController@film');
Route::get('/parse', 'PlayListController@parse');
Route::get('/test', 'PlayListController@test');

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
