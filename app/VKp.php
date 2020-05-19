<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class VKp extends Model
{
    protected $table ='viewkp';

    public function getCreatedAtAttribute($value)
    {
    $date = new Carbon($value);
    return $date->toDayDateTimeString();
    }
}
