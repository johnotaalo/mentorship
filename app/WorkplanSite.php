<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkplanSite extends Model
{
    protected $fillable = ['workplan_id', 'site_id', 'sessions'];

    protected $appends = ['site', 'resources', 'cases', 'skills'];

    public function site(){
    	return $this->belongsTo(\App\SiteRef::class, 'site_id');
    }

    public function getSiteAttribute(){
    	return \App\SiteRef::find($this->site_id);
    }

    public function getResourcesAttribute(){
    	return \App\WorkplanSiteResource::where('workplan_site_id', $this->id)->get();
    }

    public function getCasesAttribute(){
    	return \App\WorkplanSiteCase::where('workplan_site_id', $this->id)->get();
    }

    public function getSkillsAttribute(){
    	return \App\WorkplanSiteSkill::where('workplan_site_id', $this->id)->get();
    }
}
