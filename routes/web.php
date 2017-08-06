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

// Stations
Route::get('/stations', 'StationController@index');
Route::get('/stations/create', 'StationController@create');
Route::post('/stations', 'StationController@store');
Route::get('/stations/{id}/edit', 'StationController@edit');
Route::post('/stations/{id}/edit', 'StationController@update');
Route::get('/stations/{id}/turn', 'StationController@turn');
Route::get('/stations/{id}/delete', 'StationController@delete');

// Routes
Route::get('/routes', 'RouteController@index');
Route::get('/routes/create', 'RouteController@create');
Route::post('/routes', 'RouteController@store');
Route::get('/routes/{id}/edit', 'RouteController@edit');
Route::post('/routes/{id}/edit', 'RouteController@update');
Route::get('/routes/{id}/turn', 'RouteController@turn');
Route::get('/routes/{id}/delete', 'RouteController@delete');

// Travels
Route::get('/travels', 'TravelController@index');
Route::get('/travels/create', 'TravelController@create');
Route::post('/travels', 'TravelController@store');
Route::get('/travels/{id}/edit', 'TravelController@edit');
Route::post('/travels/{id}/edit', 'TravelController@update');
Route::get('/travels/{id}/turn', 'TravelController@turn');
Route::get('/travels/{id}/delete', 'TravelController@delete');

Route::get('/map', 'MapController@index');

// Reports
Route::get('/reports/incidences', 'IncidenceController@index');
// Route::get('/reports/travels', 'IncidenceController@index');
