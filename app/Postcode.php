<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Postcode extends Model {

	public function district()
    {
        return $this->hasOne('App\District', 'code');
    }

    public function ward()
    {
        return $this->hasOne('App\Ward', 'code');
    }

}
