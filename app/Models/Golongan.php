<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongan';
    protected $primaryKey = 'id_Gol';
    protected $fillable = ['nama_Gol'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_Gol');
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalAkademik::class, 'id_Gol');
    }
}
