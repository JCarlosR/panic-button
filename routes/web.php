<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/trucks', 'TruckController@index');
Route::get('/trucks/create', 'TruckController@create');
Route::post('/trucks', 'TruckController@store');
Route::get('/trucks/{id}/edit', 'TruckController@edit');
Route::post('/trucks/{id}/edit', 'TruckController@update');
Route::get('/trucks/{id}/delete', 'TruckController@delete');