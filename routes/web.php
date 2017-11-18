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

use App\Osetrovatel;


Route::get('/', 'OsetrovatelsController@index');

Auth::routes();

Route::get('/osetrovatele', 'OsetrovatelsController@index');

Route::get('/osetrovatele/create', 'OsetrovatelsController@create');

Route::post('/osetrovatele', 'OsetrovatelsController@store');

Route::get('/osetrovatele/{osetrovatel}', 'OsetrovatelsController@show');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('about', 'HomeController@index')->name('home');
