<?php

namespace App\Http\Controllers;

use App\DistressCall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncidenceController extends Controller
{

    public function index()
    {
        $calls = DistressCall::all();
        // DB::enableQueryLog();
        // $travel = $calls->first()->travel;
        // dd(DB::getQueryLog());
        return view('reports.incidences.index')->with(compact('calls'));
    }

}
