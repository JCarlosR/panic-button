<?php

namespace App\Http\Controllers\Api;

use App\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StationController extends Controller
{
    public function index()
    {
        return Station::select(['name', 'lat', 'lng'])->get();
    }
}
