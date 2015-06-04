<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model {

	public function postcodes()
    {
        return $this->hasMany('App\Postcode', 'dc', 'code');
    }

}
