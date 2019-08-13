<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'county_id', 'facility_id', 'workstation_id'];
}
