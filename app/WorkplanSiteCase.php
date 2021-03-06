<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkplanSiteCase extends Model
{
    protected $fillable = ['workplan_site_id', 'case'];

    protected $appends = ['case_data'];

    public function getCaseDataAttribute(){
    	return \App\CaseModel::find($this->case);
    }
}
