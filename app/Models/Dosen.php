<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'NIP';
    public $incrementing = false;
    protected $fillable = ['NIP', 'Nama', 'Alamat', 'Nohp'];

    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'NIP');
    }
}
