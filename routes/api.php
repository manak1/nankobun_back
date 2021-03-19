<?php

use Illuminate\Support\Facades\Route;

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

Route::post('shindan', 'ShindanController@create');
Route::get('shindan','ShindanController@index');
Route::get('shindan/search', 'ShindanController@find');
Route::get('shindan/{id}', 'ShindanController@get');