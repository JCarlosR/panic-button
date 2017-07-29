<?php

namespace App\Http\Controllers\Api;

use App\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    public function index()
    {
        return Route::with([
            'from' => function($query) {
                $query->select('id', 'lat', 'lng');
            },
            'to' => function($query) {
                $query->select('id', 'lat', 'lng');
            }
        ])->get(['distance', 'time', 'name', 'from_id', 'to_id']);
    }
}
