<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliah';
    protected $primaryKey = 'Kode_mk';
    public $incrementing = false;
    protected $fillable = ['Kode_mk', 'Nama_mk', 'sks', 'semester'];

    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'Kode_mk');
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalAkademik::class, 'Kode_mk');
    }

    public function krs()
    {
        return $this->hasMany(KRS::class, 'Kode_mk');
    }

    public function presensi()
    {
        return $this->hasMany(PresensiAkademik::class, 'Kode_mk');
    }
}
