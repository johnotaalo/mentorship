<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkplanController extends Controller
{
    function add(Request $request){
    	dd($request->input());
    }
}
