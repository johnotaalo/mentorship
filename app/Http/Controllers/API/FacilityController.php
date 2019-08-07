<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilityController extends Controller
{
    function get(Request $request){
    	$subcounty = (isset($request->subcounty)) ? $request->subcounty : null;

    	if ($subcounty != null) {
    		$facilities = \App\Facility::where('sub_county_id', $subcounty)->orderBy('facility_name', 'ASC')->get();
    	}else{
    		$facilities = \App\Facility::orderBy('facility_name', 'ASC')->get();
    	}

    	return $facilities;
    }
}
