<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    protected $fillable = [
        'temp', 'dokumen', 'nim', 'lembaga', 'alamat', 'pimpinan', 'no_telp', 'fax', 'input', 'status_kp',
    ];
    protected $table ='suratketerangan';
}
