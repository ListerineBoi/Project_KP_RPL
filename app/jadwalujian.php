<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwalujian extends Model
{
    protected $fillable = [
        'tanggal', 'jam', 'ruang', 'id_dosen','nim',
    ];
    protected $table ='jadwalujian';
}
