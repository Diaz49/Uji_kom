<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matakuliah')->insert([
            ['Kode_mk' => 'CS101', 'Nama_mk' => 'Algoritma', 'sks' => 3, 'semester' => 1],
            ['Kode_mk' => 'CS102', 'Nama_mk' => 'Struktur Data', 'sks' => 3, 'semester' => 2],
        ]);
    }
}
