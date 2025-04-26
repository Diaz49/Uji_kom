<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresensiAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('presensi_akademik')->insert([
            ['hari' => 'Senin', 'tanggal' => '2025-04-24', 'status_kehadiran' => 'Hadir', 'NIM' => '123456789', 'Kode_mk' => 'CS101'],
            ['hari' => 'Selasa', 'tanggal' => '2025-04-25', 'status_kehadiran' => 'Hadir', 'NIM' => '987654321', 'Kode_mk' => 'CS102'],
        ]);
    }
}
