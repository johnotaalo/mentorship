<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkplanSite extends Model
{
    protected $fillable = ['workplan_id', 'site_id', 'sessions'];
}
