<?php

namespace App\Http\Controllers\Api;

use App\Truck;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TruckController extends Controller
{
    public function index()
    {
        return Truck::whereNotNull('lat')->whereNotNull('lng')->get(['lat', 'lng']);
    }
}
