<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\HCWWorker;

class MentorsController extends Controller
{
    function get(Request $request){
    	$query = $request->get('query');
    	$limit = $request->get('limit');
    	$page = $request->get('page');
    	$orderBy = $request->get('orderBy');
    	$ascending = $request->get('ascending');
    	$column = $request->get('byColumn');

    	$columnRef = [
    		'hcw_name',
    		'county',
    		'mobile_number'
    	];
    	
    	$queryBuilder = HCWWorker::select('hcw_name', 'county', 'mobile_number');
    	if($query != ""){
    		$queryBuilder->where('hcw_name', 'LIKE', "%{$query}%");
    		$queryBuilder->orWhere('county', 'LIKE', "%{$query}%");
    	}

    	$allMentorsCount = $queryBuilder->count();

    	$queryBuilder->limit($limit)->skip($limit * ($page - 1));
    	if($column != ""){
    		$queryBuilder->orderBy($columnRef[$column], ($ascending) ? "ASC" : "DESC");
    	}

    	$mentors = $queryBuilder->get();

    	return [
    		'data'	=>	$mentors,
    		'count'	=>	$allMentorsCount
    	];
    }
}
