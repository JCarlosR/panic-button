<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{

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
