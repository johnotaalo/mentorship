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
// Route::get('/login', 'Auth\LoginController');
// Route::get('/', 'Dashboard\HomeController@index');
Route::get('/{any?}', 'Dashboard\HomeController@index')->where('any', '^(?!api\/)[\/\w\.-]*');
