<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\DistressCall;

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

    	$data = [];
    	$data['success'] = $saved;
    	$data['call'] = $call;
    	return $data;
    }
}
