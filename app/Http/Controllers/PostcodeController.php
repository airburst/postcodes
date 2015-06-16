<?php namespace App\Http\Controllers;

use App\Postcode;
use App\District;
use App\Ward;
use Input;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;

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
	}

	public function district($postcode)
	{
		// Fetch the district for the matching postcode	
		$district = \DB::table('districts')->
			leftJoin('postcodes', 'districts.code', '=', 'postcodes.dc')->
			where('postcodes.pc', '=', $postcode)->
			get(['districts.name']);

		return $district;
	}

	public function ward($postcode)
	{
		// Fetch the ward for the matching postcode	
		$ward = \DB::table('wards')->
			leftJoin('postcodes', 'wards.code', '=', 'postcodes.wc')->
			where('postcodes.pc', '=', $postcode)->
			get(['wards.name']);

		return $ward;
	}


	public function postcodesInDistrict($districtname)
	{
		// Fetch the postcodes within the matching district	
		$postcodes = \DB::table('districts')->
			leftJoin('postcodes', 'districts.code', '=', 'postcodes.dc')->
			where('districts.name', 'LIKE', '%'.$districtname.'%')->
			get(['postcodes.pc']);

		return $postcodes;
	}

	public function brma($postcode)
	{
		// Fetch the postcodes within the matching district	
		$brmas = \DB::table('lha_rates')->
			leftJoin('brmas', 'lha_rates.code', '=', 'brmas.code')->
			where('brmas.postcode', '=', $postcode)->
			get([
				'brmas.name',
				'lha_rates.room',
				'lha_rates.1bed',
				'lha_rates.2bed',
				'lha_rates.3bed',
				'lha_rates.4bed'
			]);

		return $brmas;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function map($postcode)
	{
		// Fetch the record with matching postcode
		$result = Postcode::where('pc', '=', $postcode)->get();
		return $result;
		///TODO: return a view with a map that can use the northing and easting
	}
}

