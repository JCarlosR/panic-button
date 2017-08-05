<?php

namespace App\Http\Controllers;

use App\Route;
use App\Travel;
use App\User;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        $travels = Travel::orderBy('departure_date', 'desc')->get();
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
        $rules = [
            'user_id' => 'required|exists:users,id',
            'departure_date' => 'required',
            'departure_time' => 'required',
            'route_id' => 'required'
        ];
        $this->validate($request, $rules);

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
}
