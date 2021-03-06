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

Route::middleware('auth.basic')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/appointments', 'ApiController@appointments');
Route::get('/clients', 'ApiController@clients');
Route::get('/doctors', 'ApiController@doctors');
Route::post('/check-in', 'ApiController@checkIn');
