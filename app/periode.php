<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class periode extends Model
{
    protected $fillable = [
        'semester', 'tahun', 'aktif', 
    ];
    protected $table ='periode';
}
