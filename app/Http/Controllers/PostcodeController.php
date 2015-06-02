<?php namespace App\Http\Controllers;

use App\Postcode;
use App\District;
use App\Ward;
use Input;

use Illuminate\Http\Request;

//use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostcodeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Postcode Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Attempt to get a postcode from input
		$postcode = Input::get('postcode', false);

		if (!$postcode) {
			// No input; return first 10
			$result = Postcode::take(10)->get();
		} 
		else {
			// Fetch the record with matching postcode
			$result = Postcode::where('pc', '=', $postcode)->get();
		}

		return $result;
		//return view('index', compact($postcodes))
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($postcode)
	{
		// Fetch the record with matching postcode
		$result = Postcode::where('pc', '=', $postcode)->get();
		return $result;
		///TODO: merge with district and ward name data
	}

}

