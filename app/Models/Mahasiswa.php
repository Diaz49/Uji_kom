<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'NIM';
    public $incrementing = false;
    protected $fillable = ['NIM', 'Nama', 'Alamat', 'Nohp', 'Semester', 'id_Gol'];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_Gol');
    }

    public function krs()
    {
        return $this->hasMany(KRS::class, 'NIM');
    }

    public function presensi()
    {
        return $this->hasMany(PresensiAkademik::class, 'NIM');
    }
}
