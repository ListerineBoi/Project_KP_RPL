<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PraKp extends Model
{
    protected $fillable = [
        'tool', 'spek', 'nim', 'judul','status_prakp', 'id_periode', 'craeted_at', 'updated_at', 
    ];
    protected $table ='prakp';
}
