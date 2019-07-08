<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\County;

class CountyController extends Controller
{
    function get(){
    	return County::orderBy('county', 'ASC')->get();
    }
}
