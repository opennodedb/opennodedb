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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/nodes')->uses('Api\NodeController@index')->name('api.nodes.index');
Route::get('/nodes/{node}')->uses('Api\NodeController@show')->name('api.nodes.show');

Route::get('/links')->uses('Api\LinkController@index')->name('api.links.index');
Route::get('/links/{link}')->uses('Api\LinkController@show')->name('api.links.show');

