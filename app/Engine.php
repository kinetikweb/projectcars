<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    /**
     * Get the cars for the engines.
     */
    public function car()
    {
        return $this->hasMany('App\Car');
    }
}
