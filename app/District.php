<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model {

	public function postcode()
    {
        return $this->belongsTo('App\Postcode');
    }

}
