<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function outcome(){
    	return $this->hasOne(\App\ExpectedOutcome::class, 'topics_id');
    }
}
