<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Travel;
use Carbon\Carbon;

class TravelController extends Controller
{
    public function pendingTravels()
    {
        $travels = Travel::where('status', '<>', 2)
            ->orderBy('departure_date', 'desc')
            ->orderBy('departure_time', 'desc')
            ->get([
                'id', 'route_id',
                'departure_date', 'departure_time',
                'user_id', 'started_at'
            ]);

        foreach ($travels as $travel) {
            $travel->route_name = $travel->route()->first(['name'])->name;
            $travel->driver_name = $travel->user()->first(['name'])->name;
            unset($travel->route);
            unset($travel->user);
        }

        return $travels;
    }

    public function myTravelsToday(Request $request)
    {
    	$user_id = $request->input('user_id');
    	$travels = Travel::where('user_id', $user_id)
    		->where('departure_date', Carbon::today())
            ->where('status', '<>', 2)
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
        if ($status == 1)
            $travel->started_at = Carbon::now();
    	if ($status == 2) // Finalizado
    		$travel->arrived_at = Carbon::now();

    	$saved = $travel->save();

    	$data = [];
    	$data['success'] = $saved;
    	return $data;
    }
}
