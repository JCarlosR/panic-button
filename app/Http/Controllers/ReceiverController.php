<?php

namespace App\Http\Controllers;

use App\Receiver;
use Illuminate\Http\Request;

class ReceiverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $receivers = Receiver::all();
        return view('receivers.index')->with(compact('receivers'));
    }

    public function create()
    {
        return view('receivers.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'dni' => 'required|size:8',
            'cellphone' => 'min:9|max:20',
            'email' => 'nullable|email'
        ];
        $this->validate($request, $rules);

        $receiver = new Receiver();

        $receiver->name = $request->input('name');
        $receiver->last_name = $request->input('last_name');
        $receiver->dni = $request->input('dni');
        $receiver->status = false;

        $receiver->role = $request->input('role');
        $receiver->description = $request->input('description');

        $receiver->cellphone = $request->input('cellphone');
        $receiver->email = $request->input('email');

        $receiver->save();

        return redirect('/receivers')->with('notification', 'El destinatario se ha registrado exitosamente!');
    }

    public function edit($id)
    {
        $receiver = Receiver::find($id);
        return view('receivers.edit')->with(compact('receiver'));
    }

    public function update($id, Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'dni' => 'required|size:8',
            'cellphone' => 'min:9|max:20',
            'email' => 'nullable|email'
        ];
        $this->validate($request, $rules);

        $receiver = Receiver::find($id);

        $receiver->name = $request->input('name');
        $receiver->last_name = $request->input('last_name');
        $receiver->dni = $request->input('dni');
        $receiver->status = false;

        $receiver->role = $request->input('role');
        $receiver->description = $request->input('description');

        $receiver->cellphone = $request->input('cellphone');
        $receiver->email = $request->input('email');

        $receiver->save();

        return redirect('/receivers')->with('notification', 'El destinatario se ha modificado correctamente!');
    }

    public function delete($id)
    {
        $receiver = Receiver::find($id);
        $receiver->delete();

        return back()->with('notification', 'El destinatario ha sido eliminado!');
    }

    public function turn($id)
    {
        $receiver = Receiver::find($id);
        $receiver->status = !$receiver->status;
        $receiver->save();

        return back()->with('notification', 'Se ha modificado el estado del destinatario.');
    }
}
