<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\HCWWorker;
use App\Mentor;

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
    		'name',
    		'email',
    		'phone'
    	];
    	
    	$queryBuilder = Mentor::select('name', 'email', 'phone');
    	if($query != ""){
    		$queryBuilder->where('name', 'LIKE', "%{$query}%");
    		$queryBuilder->orWhere('email', 'LIKE', "%{$query}%");
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

    function getSkills(){
        $skills = \App\Topic::all();

        return $skills;
    }

    function getSites(){
        $sites = \App\SiteRef::all();

        return $sites;
    }

    function getData(){
        return \App\Mentor::orderBy('name', 'ASC')->get();
    }

    function getResources(){
        return \App\Resource::all();
    }
}
