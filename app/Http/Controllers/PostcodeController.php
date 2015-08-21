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

		// Remove extraneous text from district name
		$remove = ['(B)', 'London Boro', 'District'];
		foreach ($remove as &$item) {
		    $district[0]->name = trim(str_replace($item, '', $district[0]->name));
		}

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
			where('brmas.postcode', '=', $this->shortenForBrma($postcode))->
			get([
				'brmas.name',
				'lha_rates.northing',
				'lha_rates.easting',
				'lha_rates.room',
				'lha_rates.one',
				'lha_rates.two',
				'lha_rates.three',
				'lha_rates.four'
			]);

		return $brmas;
	}


	private function cleanPostcode($postcode)
	{
		// Remove any typed spaces 
        $postcode = preg_replace('/\s+/', '', $postcode);	///TODO: replace any non alphanumerics
        $l = strlen($postcode);

        // Error checks
        if ($l == 0) { return ''; }
        if ($l < 5)  { return ''; }
        if ($l > 7)  { return ''; }

        // Add any necessary padding spaces (length 5 or 6)
        if ($l == 5) { return substr($postcode, 0, 2) . '  ' . substr($postcode, 2, 5); }
        if ($l == 6) { return substr($postcode, 0, 3) . ' ' . substr($postcode, 3, 6); }
        return $postcode;
	}


	private function shortenForBrma($postcode)
	{
		// Parse postcode first
        $p = $this->cleanPostcode($postcode);

        // Replace any double spaces with a single
        $p = preg_replace('/  +/', ' ', $p);
        $l = strlen($p);

        // Remove last two characters
        if ($l > 0) { $p = substr($p, 0, $l - 2); }
        $l = strlen($p);

        // If the postcode doesn't contain a space (e.g. SN139XE) then add one after the major
        if (strrpos($p, ' ') === false) { $p = substr($p, 0, $l - 1) . ' ' . substr($p, $l - 1, $l); }

        return $p;
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

