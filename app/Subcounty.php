<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcounty extends Model
{
	public function county(){
		return $this->belongsTo(\App\County::class, "county_id", "cto_id");
	}
}
