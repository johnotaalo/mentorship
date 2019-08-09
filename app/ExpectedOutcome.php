<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpectedOutcome extends Model
{
    protected $fillable = ['site_id','outcome','indicate'];
}
