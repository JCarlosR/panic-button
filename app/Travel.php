<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $dates = ['started_at', 'arrived_at'];

	// accessors

	/*
	0: Pendiente
	1: Viajando
	2: Finalizado
	3: Cancelado
	*/
	public function getStatusTextAttribute()
	{
		switch ($this->status) {
			case 0: return 'Pendiente';			
			case 1: return 'Viajando';
			case 2: return 'Finalizado';
			default: return 'Cancelado';
		}
	}

	public function getTimeAttribute()
    {
        if ($this->arrived_at && $this->started_at)
            return $this->arrived_at->diffInMinutes($this->started_at);

        return null;
    }

	public function getDistanceMarginAttribute()
    {
        $target = $this->route->distance;
        $real = $this->real_distance;
        if (!$real) return null;

        $percent = ($real-$target) *100 / $target;
        return round($percent, 3);
    }

    public function getTimeMarginAttribute()
    {
        if (!$this->time) return null;

        $target = $this->route->time * 60; // to minutes
        $real = $this->time;
        if (!$real) return null;

        $percent = ($real-$target) *100 / $target;
        return round($percent, 3);
    }

    public function getStatusMarginAttribute()
    {
        $dM = $this->distance_margin;
        $tM = $this->time_margin;
        if (!$dM || !$tM) return null;

        $dM = abs($dM);
        $tM = abs($tM);

        if ($dM<=5 && $tM<=5) {
            return 'success';
        } else if ($dM<=10 && $tM<=10) {
            return 'warning';
        } // else
        return 'important';
    }

	// relationships

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
