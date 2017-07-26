<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Travel;
use Carbon\Carbon;

class TravelController extends Controller
{
    public function myTravelsToday(Request $request)
    {
    	$user_id = $request->input('user_id');
    	$travels = Travel::where('user_id', $user_id)
    		->where('departure_date', Carbon::today())
    		->get();

    	foreach ($travels as $travel) {
    		$travel->route_name = $travel->route->name;
    		unset($travel->route);
    	}

    	return $travels;
    }

    public function updateStatus(Request $request, $id)
    {
    	$status = $request->input('status');

    	$travel = Travel::find($id);
    	$travel->status = $status;
    	if ($status == 2) // Finalizado
    		$travel->arrived_at = Carbon::now();

    	$saved = $travel->save();

    	$data = [];
    	$data['success'] = $saved;
    	return $data;
    }
}
