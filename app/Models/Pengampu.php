<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengampu extends Model
{
    protected $table = 'pengampu';
    protected $fillable = ['Kode_mk', 'NIP'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'NIP');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'Kode_mk');
    }
}
