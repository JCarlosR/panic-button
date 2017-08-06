<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistressCall extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

}
