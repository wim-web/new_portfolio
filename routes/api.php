<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
//about
Route::get('/about', 'AboutController@index')->name('about.index');
Route::put('/about/desc', 'AboutController@updateDesc');
Route::post('/about/skill', 'AboutController@registerSkill');
Route::put('/about/skill/{skill}', 'AboutController@updateSkill');
Route::delete('/about/skill/{skill}', 'AboutController@deleteSkill');
// work
Route::get('/works', 'WorkController@index');
Route::get('/works/{work}', 'WorkController@show');
Route::post('/works', 'WorkController@store');
Route::post('/image', 'WorkController@storeImage');
Route::delete('/works/{work}', 'WorkController@delete');
Route::put('/works/{work}', 'WorkController@update');