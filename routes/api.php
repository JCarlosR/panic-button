<?php

Route::get('trucks', 'Api\TruckController@index');
Route::get('stations', 'Api\StationController@index');
Route::get('routes', 'Api\RouteController@index');

Route::get('login', 'Api\AuthController@login');

Route::get('travels/pending', 'Api\TravelController@pendingTravels');
Route::get('travels/today', 'Api\TravelController@myTravelsToday');
Route::post('travels/{id}/status', 'Api\TravelController@updateStatus');

Route::post('distress-call', 'Api\DistressCallController@store');