<?php

use Illuminate\Http\Request;

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('trucks', 'Api\TruckController@index');

Route::get('login', 'Api\AuthController@login');

Route::get('travels/today', 'Api\TravelController@myTravelsToday');
Route::post('travels/{id}/status', 'Api\TravelController@updateStatus');

Route::post('distress-call', 'Api\DistressCallController@store');