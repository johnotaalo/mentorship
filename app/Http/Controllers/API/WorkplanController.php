<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkplanController extends Controller
{
    function add(Request $request){
    	$workplan = new \App\Workplan();

    	$workplan->subcounty_id = $request->subcounty;
    	$workplan->period_month = $request->period_month;
    	$workplan->period_year = $request->period_year;
    	$workplan->mentor_id = $request->mentor['value']['id'];
    	$workplan->mentor_venue = $request->facility;
    	$workplan->mentor_work_station = $request->workstation;
    	$workplan->created_by = \Auth::user()->id;

    	$workplan->save();

    	foreach ($request->activities as $activity) {
    		$workplan_site = new \App\WorkplanSite();

    		$workplan_site->workplan_id = $workplan->id;
    		$workplan_site->site_id = $activity['site']['value'];
    		$workplan_site->sessions = $activity['sessions'];

    		$workplan_site->save();

    		$workplan_site_id = $workplan_site->id;

    		$skills = collect($activity['skills'])->map(function($skill) use ($workplan_site_id){
    			return [
    				'workplan_site_id'	=> $workplan_site_id,
    				'topic_id'			=> $skill['id']
    			];
    		})->toArray();

    		$resources = collect($activity['resources'])->map(function($resource) use ($workplan_site_id){
    			return [
    				'workplan_site_id'	=> $workplan_site_id,
    				'resource_id'		=> $resource['value']
    			];
    		})->toArray();

    		$cases = collect($activity['cases'])->map(function($case) use ($workplan_site_id){
    			return [
    				'workplan_site_id'	=> $workplan_site_id,
    				'case'				=> $case['value']
    			];
    		})->toArray();

    		\App\WorkplanSiteSkill::insert($skills);
    		\App\WorkplanSiteResource::insert($resources);
    		\App\WorkplanSiteCase::insert($cases);
    	}

    	// Update Mentor Information
    	$mentor = \App\Mentor::find($request->mentor['value']['id']);

    	$mentor->phone = $request->mentor['value']['phone'];
    	$mentor->email = $request->mentor['value']['email'];

    	$mentor->save();
    }

    function all(Request $request){
        $q = $request->get('query');
        $limit = $request->get('limit');
        $page = $request->get('page');
        $orderBy = $request->get('orderBy');
        $ascending = $request->get('ascending');
        $column = $request->get('byColumn');

        $columnRef = [
            'name', 'county', 'facility', 'cycle'
        ];

        $queryBuilder = \App\Workplan::select('*');
        $queryBuilder->with('mentor', 'subcounty', 'venue', 'workstation');
        if($q != ""){
            $queryBuilder->whereHas('mentor', function ($query) use ($q){
                $query->where('name', 'like', "%{$q}%");
            });

            $queryBuilder->orWhereHas('subcounty', function($query) use ($q){
                $query->whereHas('county', function($cq) use ($q){
                    $cq->where('county', 'like', "%{$q}%");
                });
            });

            $queryBuilder->orWhereHas('subcounty', function($query) use ($q){
                $query->where('subcounty', 'like', "%{$q}%");
            });

            $queryBuilder->orWhereHas('venue', function($query) use ($q){
                $query->where('facility_name', 'like', "%{$q}%");
            });

            $queryBuilder->orWhereHas('workstation', function($query) use ($q){
                $query->where('facility_name', 'like', "%{$q}%");
            });
        }

        $allWorkplansCount = $queryBuilder->count();
        $queryBuilder->limit($limit)->skip($limit * ($page - 1));

        $workplans = $queryBuilder->get();

        return [
            'data'  =>  $workplans,
            'count' =>  $allWorkplansCount
        ];
    }
}
