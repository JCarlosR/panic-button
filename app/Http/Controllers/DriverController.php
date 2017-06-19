<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DriverController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $drivers = User::where('admin', false)->get();
        return view('drivers.index')->with(compact('drivers'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'dni' => 'required|size:8',
            'phone' => 'min:6|max:20',
            'birth_date' => 'date',

            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
        $this->validate($request, $rules);

        $driver = new User();
        $driver->name = $request->input('name');
        $driver->email = $request->input('email');
        $driver->password = bcrypt($request->input('password'));

        $driver->dni = $request->input('dni');
        $driver->phone = $request->input('phone');
        $driver->address = $request->input('address');
        $driver->birth_date = $request->input('birth_date');
        $driver->license = $request->input('license');
        $driver->save();

        return redirect('/drivers')->with('notification', 'El conductor se ha registrado exitosamente!');
    }

    public function edit($id)
    {
        $driver = User::find($id);
        return view('drivers.edit')->with(compact('driver'));
    }

    public function update($id, Request $request)
    {
        $rules = [
            'dni' => 'required|size:8',
            'phone' => 'min:6|max:20',
            'birth_date' => 'date',

            'name' => 'required|min:3'/*,
            'email' => 'required|email',
            'password' => 'required|min:6'*/
        ];
        $this->validate($request, $rules);

        $driver = User::find($id);
        $driver->name = $request->input('name');
//        $driver->email = $request->input('email');
//        $driver->password = bcrypt($request->input('password'));

        $driver->dni = $request->input('dni');
        $driver->phone = $request->input('phone');
        $driver->address = $request->input('address');
        $driver->birth_date = $request->input('birth_date');
        $driver->license = $request->input('license');
        $driver->save();

        return redirect('/drivers')->with('notification', 'El conductor se ha modificado exitosamente!');
    }

    public function delete($id)
    {
        $driver = User::find($id);
        $driver->delete();

        return back()->with('notification', 'El conductor ha sido eliminado!');
    }

}
