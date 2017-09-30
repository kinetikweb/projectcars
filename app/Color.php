<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * Get the cars for the Color.
     */
    public function car()
    {
        return $this->hasMany('App\Car');
    }
}
