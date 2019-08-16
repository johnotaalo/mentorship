<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workplan extends Model
{
    protected $fillable = ["subcounty_id", "period_month", "period_year", "mentor_id", "mentor_venue", "mentor_work_station", "created_by"];

    protected $appends = ['county'];

    public function subcounty(){
    	return $this->belongsTo(\App\Subcounty::class, "subcounty_id", "subcounty_id");
    }

    public function mentor(){
    	return $this->belongsTo(\App\Mentor::class);
    }

    public function venue(){
    	return $this->belongsTo(\App\Facility::class, "mentor_venue", "survey_cto_id");
    }

    public function workstation(){
    	return $this->belongsTo(\App\Facility::class, "mentor_work_station", "survey_cto_id");
    }

    public function sites(){
        return $this->hasMany(\App\WorkplanSite::class);
    }

    public function getCountyAttribute(){
    	return \App\Subcounty::where('subcounty_id', $this->subcounty_id)->first()->county;
    }
}
