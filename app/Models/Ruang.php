<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = 'ruang';
    protected $primaryKey = 'id_ruang';
    protected $fillable = ['nama_ruang'];

    public function jadwal()
    {
        return $this->hasMany(JadwalAkademik::class, 'id_ruang');
    }
}
