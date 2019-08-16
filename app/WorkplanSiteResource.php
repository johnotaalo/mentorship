<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkplanSiteResource extends Model
{
    protected $fillable = ['workplan_site_id', 'resource_id'];

    protected $appends = ['resource_data'];

    public function resource(){
    	return $this->belongsTo(\App\Resource::class);
    }

    public function getResourceDataAttribute(){
    	return \App\Resource::find($this->resource_id);
    }
}
