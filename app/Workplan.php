<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workplan extends Model
{
    protected $fillable = ["subcounty_id", "period_month", "period_year", "mentor_id", "mentor_venue", "mentor_work_station", "created_by"];
}
