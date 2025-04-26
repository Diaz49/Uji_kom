<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwal_akademik')->insert([
            ['hari' => 'Senin', 'Kode_mk' => 'CS101', 'id_ruang' => 1, 'id_Gol' => 1],
            ['hari' => 'Selasa', 'Kode_mk' => 'CS102', 'id_ruang' => 2, 'id_Gol' => 2],
        ]);
    }
}
