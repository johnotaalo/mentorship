<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilityController extends Controller
{
    function get(Request $request){
    	$county_id = (isset($request->county_id)) ? $request->county_id : null;

    	if ($county_id != null) {
    		$facilities = \App\Facility::where('county_id', $county_id)->get();
    	}else{
    		$facilities = \App\Facility::get();
    	}

    	return $facilities;
    }
}
