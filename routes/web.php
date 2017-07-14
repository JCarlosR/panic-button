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

// Set truck to driver
Route::post('/drivers/truck', 'DriverController@setTruck');

// Receivers
Route::get('/receivers', 'ReceiverController@index');
Route::get('/receivers/create', 'ReceiverController@create');
Route::post('/receivers', 'ReceiverController@store');
Route::get('/receivers/{id}/edit', 'ReceiverController@edit');
Route::post('/receivers/{id}/edit', 'ReceiverController@update');
Route::get('/receivers/{id}/turn', 'ReceiverController@turn');
Route::get('/receivers/{id}/delete', 'ReceiverController@delete');

Route::get('/map', 'MapController@index');
