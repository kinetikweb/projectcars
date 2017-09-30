<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * Get the brand that owns the car.
     */
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    /**
     * Get the modelbrand that owns the car.
     */
    public function modelbrand()
    {
        return $this->belongsTo('App\Modelb');
    }

    /**
     * Get the engine that owns the car.
     */
    public function engine()
    {
        return $this->belongsTo('App\Engine');
    }

    /**
     * Get the color that owns the car.
     */
    public function color()
    {
        return $this->belongsTo('App\Color');
    }
}
