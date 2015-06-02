<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model {

	public function postcode()
    {
        return $this->belongsTo('App\Postcode');
    }

}
