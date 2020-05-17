<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kp extends Model
{
    protected $fillable = [
        'tool', 'spek', 'nim', 'judul', 'id_periode', 'craeted_at','status_kp', 'updated_at', 
    ];
    protected $table ='kp';
}
