<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class VPraKp extends Model
{
    protected $table ='viewprakp';

    public function getCreatedAtAttribute($value)
    {
    $date = new Carbon($value);
    return $date->toDayDateTimeString();
    }
}
