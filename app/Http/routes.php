<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

// Search API
Route::get('postcode', 'PostcodeController@index');
Route::get('postcode/{postcode}', 'PostcodeController@show');
Route::get('postcode/{postcode}/district', 'PostcodeController@district');
Route::get('postcode/{postcode}/ward', 'PostcodeController@ward');
Route::get('postcode/district/{districtname}', 'PostcodeController@postcodesInDistrict');

// BRMA
Route::get('brma/{postcode}', 'PostcodeController@brma');

// Map API
Route::get('map/{postcode}', 'PostcodeController@map');