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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('about', 'HomeController@index')->name('home');

// ************************ OŠETŘOVATELÉ *********************************
//Route::get('/', 'OsetrovatelsController@index');

Route::get('/osetrovatele', 'OsetrovatelsController@index');

Route::get('/osetrovatele/create', ['as' => 'osetrovatele.create', 'uses' => 'OsetrovatelsController@create']);

Route::post('/osetrovatele', 'OsetrovatelsController@store');

Route::patch('/osetrovatele/{osetrovatel}', ['as' => 'osetrovatele.update', 'uses' => 'OsetrovatelsController@update']);

Route::get('/osetrovatele/{osetrovatel}', 'OsetrovatelsController@show');

Route::get('/osetrovatele/{osetrovatel}/edit', ['as' => 'osetrovatele.edit', 'uses' => 'OsetrovatelsController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/osetrovatele/{osetrovatel}', ['as' => 'osetrovatele.destroy', 'uses' => 'OsetrovatelsController@destroy']);

// ************************ VÝBĚHY *********************************
Route::get('/vybehy', 'VybehsController@index');

Route::get('/vybehy/create', 'VybehsController@create');

Route::post('/vybehy', 'VybehsController@store');

Route::patch('/vybehy/{vybeh}', ['as' => 'vybehy.update', 'uses' => 'VybehsController@update']);

Route::get('/vybehy/{vybeh}', 'VybehsController@show');

Route::get('/vybehy/{vybeh}/edit', ['as' => 'vybehy.edit', 'uses' => 'VybehsController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/vybehy/{vybeh}', ['as' => 'vybehy.destroy', 'uses' => 'VybehsController@destroy']);

// ************************ ZVÍŘATA *********************************
Route::get('/zvirata', 'ZviresController@index');

Route::get('/zvirata/create', 'ZviresController@create');

Route::post('/zvirata', 'ZviresController@store');

Route::patch('/zvirata/{zvire}', ['as' => 'zvirata.update', 'uses' => 'ZviresController@update']);

Route::get('/zvirata/{zvire}', 'ZviresController@show');

Route::get('/zvirata/{zvire}/edit', ['as' => 'zvirata.edit', 'uses' => 'ZviresController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/zvirata/{zvire}', ['as' => 'zvirata.destroy', 'uses' => 'ZviresController@destroy']);