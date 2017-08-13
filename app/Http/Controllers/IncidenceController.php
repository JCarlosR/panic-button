<?php

namespace App\Http\Controllers;

use App\DistressCall;
use App\Route;
use App\Travel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncidenceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $calls = DistressCall::all();
        // DB::enableQueryLog();
        // $travel = $calls->first()->travel;
        // dd(DB::getQueryLog());
        return view('reports.incidences.index')->with(compact('calls'));
    }

    public function matrix(Request $request)
    {
        $matrix = null;
        $days = [];

        $drivers = User::where('admin', 0)->where('truck_id', '<>', 0)->get();

        $user_id = $request->input('user_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($user_id && $start_date && $end_date) {
            $start = Carbon::parse($start_date);
            $end = Carbon::parse($end_date);

            while ($start < $end) {
                $days[] = $start->format('d F');
                $matrix[] = $this->getIncidencesByHoursAt($start, $user_id);
                $start = $start->addDay();
                // var_dump($start);
            }
            // die();
        }
        // dd($matrix);

        return view('reports.incidences.matrix')->with(compact(
            'matrix', 'drivers', 'days',
            'start_date', 'end_date', 'user_id'
        ));
    }

    public function getIncidencesByHoursAt($date, $user_id) {
        $countByHours = [];
        for ($h=0; $h<6; ++$h) { // [0,4> [4,8> [8,11> ...
            $start = $date->copy()->addHours($h*4);
            $end = $start->copy()->addHours(4);
            $countByHours[] = DistressCall::where('user_id', $user_id)->whereBetween('created_at', [$start, $end])->count();
        }

        return $countByHours;
    }

    public function driversVsRoutes(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        if ($year && $month) {
            $routes = Route::all();
            foreach ($routes as $route) {
                $route->travelIds = Travel::where('route_id', $route->id)->pluck('id');
            }
            $drivers = User::where('admin', 0)->where('truck_id', '<>', 0)
                ->with('truck')->get();
            // January = 1
            $query = DistressCall::whereYear('created_at', $year)->whereMonth('created_at', $month+1);
            // dd($query->get());
        } else {
            $routes = [];
            $drivers = [];
            $query = null;
        }

        return view('reports.incidences.drivers-vs-routes')->with(compact(
            'routes', 'drivers', 'query',
            'year', 'month'
        ));
    }

    public function routesVsMonths()
    {

    }

}
