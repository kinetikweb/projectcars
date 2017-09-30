<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelb extends Model
{
    /**
     * Get the cars for the ModelBrand.
     */
    public function car()
    {
        return $this->hasMany('App\Car');
    }

    /**
     * Get the brand that owns the Brand.
     */
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}
