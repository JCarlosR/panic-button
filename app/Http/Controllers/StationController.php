<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function index()
    {
        $stations = Station::all();
        return view('movements.stations.index')->with(compact('stations'));
    }

    public function create()
    {
        return view('movements.stations.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];
        $this->validate($request, $rules);

        $station = new Station();
        $station->name = $request->input('name');
        $station->phone = $request->input('phone');
        $station->address = $request->input('address');
        $station->lat = $request->input('lat') ?: '';
        $station->lng = $request->input('lng') ?: '';
        $station->description = $request->input('description') ?: '';
        $station->save();

        return redirect('/stations')->with('notification', 'La estación se ha registrado correctamente!');
    }

    public function edit($id)
    {
        $station = Station::find($id);
        return view('movements.stations.edit')->with(compact('station'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];
        $this->validate($request, $rules);

        $station = Station::find($id);
        $station->name = $request->input('name');
        $station->phone = $request->input('phone');
        $station->address = $request->input('address');
        $station->lat = $request->input('lat') ?: '';
        $station->lng = $request->input('lng') ?: '';
        $station->description = $request->input('description') ?: '';
        $station->save();

        return redirect('/stations')->with('notification', 'La estación se ha modificado exitosamente!');
    }

    public function delete($id)
    {
        $receiver = Station::find($id);
        $receiver->delete();

        return back()->with('notification', 'La estación se ha eliminado!');
    }

}
