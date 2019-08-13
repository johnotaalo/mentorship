<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpectedOutcome extends Model
{
    protected $fillable = ['topics_id','outcome','indicate'];
}
