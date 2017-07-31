<?php

namespace App\Http\Controllers\Api;

use App\Mail\EmergencyCallReceived;
use App\Receiver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\DistressCall;
use Illuminate\Support\Facades\Mail;

class DistressCallController extends Controller
{
    public function store(Request $request)
    {
    	$call = new DistressCall();
    	$call->user_id = $request->input('user_id');
    	$call->travel_id = $request->input('travel_id');
    	$call->lat = $request->input('lat');
    	$call->lng = $request->input('lng');
    	$saved = $call->save();

    	$receivers = Receiver::pluck('email');
        Mail::to($receivers)->send(new EmergencyCallReceived($call));

    	$data = [];
    	$data['success'] = $saved;
    	$data['call'] = $call;
    	return $data;
    }
}
