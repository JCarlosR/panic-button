<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{

    // accessors

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->last_name;
    }

}
