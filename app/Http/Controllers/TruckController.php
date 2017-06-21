<?php

namespace App\Http\Controllers;

use App\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $trucks = Truck::all();
        return view('trucks.index')->with(compact('trucks'));
    }

    public function create()
    {
        return view('trucks.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'code' => 'required|min:4',
            'year' => 'integer|min:1970',
            'capacity' => 'required|numeric|min:0.1|max:1000'
        ];
        $this->validate($request, $rules);

        $truck = new Truck();
        $truck->code = $request->input('code');
        $truck->brand = $request->input('brand');
        $truck->model = $request->input('model');
        $truck->year = $request->input('year');
        $truck->capacity = $request->input('capacity');
        $truck->user_id = auth()->user()->id; // temporary

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/trucks';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);

            $truck->image = $fileName;
        }

        $truck->save();

        return redirect('/trucks')->with('notification', 'El camión se ha registrado exitosamente!');
    }

    public function edit($id)
    {
        $truck = Truck::find($id);
        return view('trucks.edit')->with(compact('truck'));
    }

    public function update($id, Request $request)
    {
        $rules = [
            'code' => 'required|min:4',
            'year' => 'integer|min:1970',
            'capacity' => 'required|numeric|min:0.1|max:1000'
        ];
        $this->validate($request, $rules);

        $truck = Truck::find($id);
        $truck->code = $request->input('code');
        $truck->brand = $request->input('brand');
        $truck->model = $request->input('model');
        $truck->year = $request->input('year');
        $truck->capacity = $request->input('capacity');
        // $truck->user_id = auth()->user()->id; // temporary

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/trucks';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);

            $truck->image = $fileName;
        }
        $truck->save();

        return redirect('/trucks')->with('notification', 'El camión se ha modificado exitosamente!');
    }

    public function delete($id)
    {
        $truck = Truck::find($id);
        $truck->delete();

        return back()->with('notification', 'El camión ha sido eliminado!');
    }

}
