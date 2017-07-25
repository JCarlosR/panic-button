<?php

namespace App\Http\Controllers;

use App\Route;
use App\Station;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        return view('movements.routes.index')->with(compact('routes'));
    }

    public function create()
    {
        $stations = Station::all();
        return view('movements.routes.create')->with(compact('stations'));
    }

    public function store(Request $request)
    {
        $rules = [
            'from_id' => 'exists:stations,id',
            'to_id' => 'exists:stations,id',
            'name' => 'required'
        ];
        $this->validate($request, $rules);

        $route = new Route();
        $route->from_id = $request->input('from_id');
        $route->to_id = $request->input('to_id');
        $route->name = $request->input('name');
        $route->time = $request->input('time');
        $route->distance = $request->input('distance');
        $route->save();

        $notification = 'La nueva ruta se ha registrado correctamente';
        return redirect('routes')->with(compact('notification'));
    }

    public function edit($id)
    {
        $stations = Station::all();
        $route = Route::find($id);
        return view('movements.routes.edit')->with(compact('stations', 'route'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'from_id' => 'exists:stations,id',
            'to_id' => 'exists:stations,id',
            'name' => 'required'
        ];
        $this->validate($request, $rules);

        $route = Route::find($id);
        $route->from_id = $request->input('from_id');
        $route->to_id = $request->input('to_id');
        $route->name = $request->input('name');
        $route->time = $request->input('time');
        $route->distance = $request->input('distance');
        $route->save();

        $notification = 'La ruta se ha actualizado correctamente';
        return redirect('routes')->with(compact('notification'));
    }

    public function delete($id)
    {
        $route = Route::find($id);
        $route->delete();

        $notification = 'La ruta indicada se ha eliminado correctamente';
        return redirect('routes')->with(compact('notification'));
    }
}
