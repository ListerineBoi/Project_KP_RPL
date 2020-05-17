<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Sk extends Model
{
    protected $fillable = [
        'temp', 'dokumen', 'nim', 'lembaga', 'alamat', 'pimpinan', 'no_telp', 'fax', 'input', 'status_sk',
    ];
    protected $table ='suratketerangan';
    public function getCreatedAtAttribute($value)
    {
    $date = new Carbon($value);
    return $date->toDayDateTimeString();
    }
}
