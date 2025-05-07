<?php

use Illuminate\Http\Request;
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


Route::get('/wines', 'API\WineController@index');
Route::get('/wines/filters', 'API\WineController@filters');
Route::get('/wines/{id}', 'API\WineController@show');
Route::post('/order', 'API\OrderController@createOrder');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
