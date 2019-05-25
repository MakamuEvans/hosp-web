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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/drugs', 'DrugController');
Route::resource('/lab-tests', 'LabTestController');
Route::resource('/radiology-tests', 'RadiologyTestController');
Route::resource('/clients', 'ClientController');
Route::resource('/check-ins', 'CheckInController');
Route::resource('/users', 'UserController');
Route::get('/search-client', 'ClientController@search');
Route::get('/init-check-in', 'CheckInController@initCheckIn');
