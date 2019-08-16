<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	public $appends = ['outcomes_data'];

    public function outcome(){
    	return $this->hasOne(\App\ExpectedOutcome::class, 'topics_id');
    }

    public function getOutcomesDataAttribute(){
    	return \App\ExpectedOutcome::where('topics_id', $this->id)->first();
    }
}
