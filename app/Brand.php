<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * Get the cars for the brand.
     */
    public function car()
    {
        return $this->hasMany('App\Car');
    }

    /**
     * Get the cars for the modebbrand.
     */
    public function modelb()
    {
        return $this->hasMany('App\Modelb');
    }
}
