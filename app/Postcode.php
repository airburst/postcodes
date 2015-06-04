<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Postcode extends Model {

	public function district()
    {
        return $this->belongsTo('App\District');
    }

    // public function ward()
    // {
    //     return $this->belongsTo('App\Ward');
    // }

}
