<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function from()
    {
        return $this->belongsTo('App\Station');
    }

    public function to()
    {
        return $this->belongsTo('App\Station');
    }
}
