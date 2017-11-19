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
//Route::get('/', 'OsetrovatelController@index');

Route::get('/osetrovatele', 'OsetrovatelController@index');

Route::get('/osetrovatele/create', ['as' => 'osetrovatele.create', 'uses' => 'OsetrovatelController@create']);

Route::post('/osetrovatele', 'OsetrovatelController@store');

Route::patch('/osetrovatele/{osetrovatel}', ['as' => 'osetrovatele.update', 'uses' => 'OsetrovatelController@update']);

Route::get('/osetrovatele/{osetrovatel}', 'OsetrovatelController@show');

Route::get('/osetrovatele/{osetrovatel}/edit', ['as' => 'osetrovatele.edit', 'uses' => 'OsetrovatelController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/osetrovatele/{osetrovatel}', ['as' => 'osetrovatele.destroy', 'uses' => 'OsetrovatelController@destroy']);

// ************************ VÝBĚHY *********************************
Route::get('/vybehy', 'VybehController@index');

Route::get('/vybehy/create', 'VybehController@create');

Route::post('/vybehy', 'VybehController@store');

Route::patch('/vybehy/{vybeh}', ['as' => 'vybehy.update', 'uses' => 'VybehController@update']);

Route::get('/vybehy/{vybeh}', 'VybehController@show');

Route::get('/vybehy/{vybeh}/edit', ['as' => 'vybehy.edit', 'uses' => 'VybehController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/vybehy/{vybeh}', ['as' => 'vybehy.destroy', 'uses' => 'VybehController@destroy']);

// ************************ ZVÍŘATA *********************************
Route::get('/zvirata', 'ZvireController@index');

Route::get('/zvirata/create', 'ZvireController@create');

Route::post('/zvirata', 'ZvireController@store');

Route::patch('/zvirata/{zvire}', ['as' => 'zvirata.update', 'uses' => 'ZvireController@update']);

Route::get('/zvirata/{zvire}', 'ZvireController@show');

Route::get('/zvirata/{zvire}/edit', ['as' => 'zvirata.edit', 'uses' => 'ZvireController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/zvirata/{zvire}', ['as' => 'zvirata.destroy', 'uses' => 'ZvireController@destroy']);

// ************************ TYPY VÝBĚHU *********************************
Route::get('/typyVybehu', 'TypVybehuController@index');

Route::get('/typyVybehu/create', 'TypVybehuController@create');

Route::post('/typyVybehu', 'TypVybehuController@store');

Route::patch('/typyVybehu/{typVybehu}', ['as' => 'typyVybehu.update', 'uses' => 'TypVybehuController@update']);

Route::get('/typyVybehu/{typVybehu}/edit', ['as' => 'typyVybehu.edit', 'uses' => 'TypVybehuController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/typyVybehu/{typVybehu}', ['as' => 'typyVybehu.destroy', 'uses' => 'TypVybehuController@destroy']);

// ************************ DRUH ZVIRETE *********************************
Route::get('/druhyZvirat', 'DruhZvireteController@index');

Route::get('/druhyZvirat/create', 'DruhZvireteController@create');

Route::post('/druhyZvirat', 'DruhZvireteController@store');

Route::patch('/druhyZvirat/{druhZvirete}', ['as' => 'druhyZvirat.update', 'uses' => 'DruhZvireteController@update']);

Route::get('/druhyZvirat/{druhZvirete}/edit', ['as' => 'druhyZvirat.edit', 'uses' => 'DruhZvireteController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/druhyZvirat/{druhZvirete}', ['as' => 'druhyZvirat.destroy', 'uses' => 'DruhZvireteController@destroy']);