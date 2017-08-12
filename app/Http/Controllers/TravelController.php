<?php

namespace App\Http\Controllers;

use App\Route;
use App\Travel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TravelController extends Controller
{
    public function index()
    {
        $travels = Travel::orderBy('departure_date', 'desc')
            ->orderBy('departure_time', 'desc')->get();

        return view('movements.travels.index')->with(compact('travels'));
    }

    public function create()
    {
        $routes = Route::all();
        $drivers = User::where('admin', false)->get();
        return view('movements.travels.create')->with(compact('routes', 'drivers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'departure_date' => 'required',
            'departure_time' => 'required',
            'route_id' => 'required'
        ]);

        $validator->after(function ($validator) use ($request) {
            $user_id = $request->input('user_id');
            $departure_time = $request->input('departure_time');
            $departure_date = $request->input('departure_date'); // 12 Ago

            $departureDateCarbon = Carbon::parse($departure_date);
            $start = $departureDateCarbon->subDay(); // 11 Ago
            $end = $departureDateCarbon->addDay(); // 13 Ago

            if ($user_id && $departure_date) {
                $travelsTheSameAndThePreviousDay =
                    Travel::where('user_id', $user_id)->whereBetween('departure_date', [$start, $end])->get();

                $dateTimeCarbon = Carbon::parse($departure_date .' '. $departure_time);
                $thereAreCollisions = false;

                foreach ($travelsTheSameAndThePreviousDay as $scheduledTravel) {
                    $sTravel = Carbon::parse($scheduledTravel->departure_date .' '. $scheduledTravel->departure_time);
                    $durationHours = $scheduledTravel->route->time;
                    // dd($dateTimeCarbon->diffInHours($sTravel));
                    if ($dateTimeCarbon->diffInHours($sTravel) < $durationHours) {
                        $thereAreCollisions = true;
                        break;
                    }
                }

                if ($thereAreCollisions) {
                    $validator->errors()->add('inconsistency', 'Este conductor ya tiene programado un viaje para esa hora en ese día!');
                }
            }


        });

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $travel = new Travel();
        $travel->route_id = $request->input('route_id');
        $travel->departure_date = $request->input('departure_date');
        $travel->departure_time = $request->input('departure_time');
        $travel->user_id = $request->input('user_id');
        $travel->save();

        $notification = 'El viaje se ha programado exitosamente.';
        return redirect('travels')->with(compact('notification'));
    }

    public function edit($id)
    {
        $travel = Travel::find($id);
        $routes = Route::all();
        $drivers = User::where('admin', false)->get();
        return view('movements.travels.edit')->with(compact('travel', 'routes', 'drivers'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'user_id' => 'required|exists:users,id',
            'departure_date' => 'required',
            'departure_time' => 'required',
            'route_id' => 'required'
        ];
        $this->validate($request, $rules);

        $travel = Travel::find($id);
        $travel->route_id = $request->input('route_id');
        $travel->departure_date = $request->input('departure_date');
        $travel->departure_time = $request->input('departure_time');
        $travel->user_id = $request->input('user_id');
        $travel->save();

        $notification = 'El viaje se ha modificado exitosamente.';
        return redirect('travels')->with(compact('notification'));
    }

    public function delete($id)
    {
        $travel = Travel::find($id);
        $travel->delete();

        $notification = 'El viaje se ha eliminado correctamente.';
        return back()->with(compact('notification'));
    }

    public function report()
    {
        $travels = Travel::orderBy('departure_date', 'desc')
            ->orderBy('departure_time', 'desc')->get();

        return view('reports.travels.index')->with(compact('travels'));
    }
}
