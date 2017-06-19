<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Trucks
Route::get('/trucks', 'TruckController@index');
Route::get('/trucks/create', 'TruckController@create');
Route::post('/trucks', 'TruckController@store');
Route::get('/trucks/{id}/edit', 'TruckController@edit');
Route::post('/trucks/{id}/edit', 'TruckController@update');
Route::get('/trucks/{id}/delete', 'TruckController@delete');

// Drivers
Route::get('/drivers', 'DriverController@index');
Route::get('/drivers/create', 'DriverController@create');
Route::post('/drivers', 'DriverController@store');
Route::get('/drivers/{id}/edit', 'DriverController@edit');
Route::post('/drivers/{id}/edit', 'DriverController@update');
Route::get('/drivers/{id}/delete', 'DriverController@delete');

Route::get('/map', 'MapController@index');
