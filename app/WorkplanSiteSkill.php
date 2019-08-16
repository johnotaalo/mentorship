<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkplanSiteSkill extends Model
{
    protected $fillable = ['workplan_site_id', 'topic_id'];

    protected $appends = ['skill_data'];

    public function getSkillDataAttribute(){
    	return \App\Topic::find($this->topic_id);
    }
}
