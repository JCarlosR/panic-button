<?php

namespace App\Http\Controllers\Api;

use App\Mail\EmergencyCallReceived;
use App\Receiver;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\DistressCall;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;

class DistressCallController extends Controller
{

    public function index()
    {
        $calls = DistressCall::where('answered', false)
            ->with([
                'user' => function ($query) {
                    $query->select('name', 'id');
                }
            ])
            ->orderBy('id', 'desc')
            ->get(['id','user_id','travel_id','lat','lng', 'created_at']);

        foreach ($calls as $call) {
            $call->route_name = $call->travel->route->name;
            unset($call->travel);
        }
        return $calls;
    }

    public function store(Request $request)
    {
    	$call = new DistressCall();
    	$call->user_id = $request->input('user_id');
    	$call->travel_id = $request->input('travel_id');
    	$call->lat = $request->input('lat');
    	$call->lng = $request->input('lng');
    	$saved = $call->save();

    	// Send mails
    	$receivers = Receiver::where('status', 1)->pluck('email');
        Mail::to($receivers)->send(new EmergencyCallReceived($call));

        // Send SMS
        $user = User::find($call->user_id);
        $name = $user->name;
        $dni = $user->dni;
        $googleMapsLink = "https://www.google.com/maps/dir/$call->lat,$call->lng";

        $smsText = "Incidencia! Conductor $name (DNI $dni). Pos: $googleMapsLink";
        $phones = Receiver::where('status', 1)->pluck('cellphone');
        foreach ($phones as $phone)
            Nexmo::message()->send([
                'to' => $phone, // '51966543777',
                'from' => '51990044442',
                'text' => $smsText
            ]);

    	$data = [];
    	$data['success'] = $saved;
    	$data['call'] = $call;
    	return $data;
    }
}
