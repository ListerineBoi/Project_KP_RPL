<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PraKp extends Model
{
    protected $fillable = [
        'lembaga', 'alamat', 'pimpinan', 'no_telp', 'fax', 'dokumen', 'tool', 'spek', 'nim', 'judul','status_prakp', 'id_periode', 'craeted_at', 'updated_at', 
    ];
    protected $table ='prakp';
}
