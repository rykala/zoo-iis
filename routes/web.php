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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('about', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// ************************ OŠETŘOVATELÉ *********************************
//Route::get('/', 'OsetrovatelController@index');

Route::get('/osetrovatele', 'OsetrovatelController@index');

//Route::get('/osetrovatele/create', ['middleware' => 'level:2', 'as' => 'osetrovatele.create', 'uses' => 'OsetrovatelController@create']);

//Route::post('/osetrovatele', 'OsetrovatelController@store');

Route::patch('/osetrovatele/{osetrovatel}', ['as' => 'osetrovatele.update', 'uses' => 'OsetrovatelController@update']);

Route::get('/osetrovatele/{osetrovatel}', 'OsetrovatelController@show');

Route::get('/osetrovatele/{osetrovatel}/edit', ['as' => 'osetrovatele.edit', 'uses' => 'OsetrovatelController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/osetrovatele/{osetrovatel}', ['middleware' => 'level:2', 'as' => 'osetrovatele.destroy', 'uses' => 'OsetrovatelController@destroy']);

// ************************ VÝBĚHY *********************************
Route::get('/vybehy', ['uses' => 'VybehController@index']);

Route::get('/vybehy/create', ['middleware' => 'level:3', 'uses' => 'VybehController@create']);

Route::post('/vybehy', ['middleware' => 'level:3', 'uses' => 'VybehController@store']);

Route::patch('/vybehy/{vybeh}', ['middleware' => 'level:3', 'as' => 'vybehy.update', 'uses' => 'VybehController@update']);

Route::get('/vybehy/{vybeh}', ['uses' => 'VybehController@show']);

Route::get('/vybehy/{vybeh}/edit', ['middleware' => 'level:3', 'as' => 'vybehy.edit', 'uses' => 'VybehController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/vybehy/{vybeh}', ['middleware' => 'level:3', 'as' => 'vybehy.destroy', 'uses' => 'VybehController@destroy']);

// ************************ ZVÍŘATA *********************************
Route::get('/zvirata', 'ZvireController@index');

Route::get('/zvirata/create', ['middleware' => 'level:2', 'uses' => 'ZvireController@create']);

Route::post('/zvirata', 'ZvireController@store');

Route::patch('/zvirata/{zvire}', ['as' => 'zvirata.update', 'uses' => 'ZvireController@update']);

Route::get('/zvirata/{zvire}', 'ZvireController@show');

Route::get('/zvirata/{zvire}/edit', ['as' => 'zvirata.edit', 'uses' => 'ZvireController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/zvirata/{zvire}', ['as' => 'zvirata.destroy', 'uses' => 'ZvireController@destroy']);

// ************************ TYPY VÝBĚHU *********************************
Route::get('/typyVybehu', ['uses' => 'TypVybehuController@index']);

Route::get('/typyVybehu/create', ['middleware' => 'level:3', 'uses' => 'TypVybehuController@create']);

Route::post('/typyVybehu', ['middleware' => 'level:3', 'uses' => 'TypVybehuController@store']);

Route::patch('/typyVybehu/{typVybehu}', ['as' => 'typyVybehu.update', 'middleware' => 'level:3', 'uses' => 'TypVybehuController@update']);

Route::get('/typyVybehu/{typVybehu}/edit', ['as' => 'typyVybehu.edit', 'middleware' => 'level:3', 'uses' => 'TypVybehuController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/typyVybehu/{typVybehu}', ['as' => 'typyVybehu.destroy', 'middleware' => 'level:3', 'uses' => 'TypVybehuController@destroy']);

// ************************ DRUH ZVIRETE *********************************
Route::get('/druhyZvirat', 'DruhZvireteController@index');

Route::get('/druhyZvirat/create', ['middleware' => 'level:2', 'uses' => 'DruhZvireteController@create']);

Route::post('/druhyZvirat', ['middleware' => 'level:2', 'uses' => 'DruhZvireteController@store']);

Route::get('/druhyZvirat/{druhZvirete}', 'DruhZvireteController@show');

Route::patch('/druhyZvirat/{druhZvirete}', ['middleware' => 'level:2', 'as' => 'druhyZvirat.update', 'uses' => 'DruhZvireteController@update']);

Route::get('/druhyZvirat/{druhZvirete}/edit', ['middleware' => 'level:2', 'as' => 'druhyZvirat.edit', 'uses' => 'DruhZvireteController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/druhyZvirat/{druhZvirete}', ['middleware' => 'level:2', 'as' => 'druhyZvirat.destroy', 'uses' => 'DruhZvireteController@destroy']);

// ************************ ČIŠTĚNÍ *********************************
Route::get('/cisteni', 'CisteniController@index');

Route::get('/cisteni/create', ['middleware' => 'level:2', 'uses' => 'CisteniController@create']);

Route::post('/cisteni', ['middleware' => 'level:2', 'uses' => 'CisteniController@store']);

Route::patch('/cisteni/{cisteni}', ['middleware' => 'level:2', 'as' => 'cisteni.update', 'uses' => 'CisteniController@update']);

Route::get('/cisteni/{cisteni}', 'CisteniController@show');

Route::get('/cisteni/{cisteni}/edit', ['middleware' => 'level:2', 'as' => 'cisteni.edit', 'uses' => 'CisteniController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/cisteni/{cisteni}', ['middleware' => 'level:2', 'as' => 'cisteni.destroy', 'uses' => 'CisteniController@destroy']);

// ************************ ŠKOLENÍ *********************************
Route::get('/skoleni', 'SkoleniController@index');

Route::get('/skoleni/create', ['middleware' => 'level:2', 'uses' => 'SkoleniController@create']);

Route::post('/skoleni', ['middleware' => 'level:2', 'uses' => 'SkoleniController@store']);

Route::patch('/skoleni/{skoleni}', ['middleware' => 'level:2', 'as' => 'skoleni.update', 'uses' => 'SkoleniController@update']);

Route::get('/skoleni/{skoleni}', 'SkoleniController@show');

Route::get('/skoleni/{skoleni}/edit', ['middleware' => 'level:2', 'as' => 'skoleni.edit', 'uses' => 'SkoleniController@edit']);

// bez as pole nešlo odkazovat cestu z blade souboru
Route::delete('/skoleni/{skoleni}', ['middleware' => 'level:2', 'as' => 'skoleni.destroy', 'uses' => 'SkoleniController@destroy']);

// ************************ ROLE *********************************
//Route::get('/getRoleAdmin', 'RoleController@getRoleAdmin');
//
//Route::get('/getRoleHlavniOsetrovatel', 'RoleController@getRoleHlavniOsetrovatel');
//
//Route::get('/getRoleOsetrovatel', 'RoleController@getRoleOsetrovatel');
//
//Route::get('/setAdmin/{id}', 'RoleController@setAdmin');

Route::get('/setHlavniOsetrovatel/{id}', ['middleware' => 'level:3', 'uses' => 'RoleController@setHlavniOsetrovatel']);

Route::get('/unsetHlavniOsetrovatel/{id}', ['middleware' => 'level:3', 'uses' => 'RoleController@unsetHlavniOsetrovatel']);
