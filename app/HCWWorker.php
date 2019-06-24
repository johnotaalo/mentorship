<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HCWWorker extends Model
{
    protected $connection = "imci";
    protected $table = "hcw_workers";
}
