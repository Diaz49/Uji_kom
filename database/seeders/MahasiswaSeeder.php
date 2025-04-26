<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('mahasiswa')->insert([
                'NIM' => 'NIM' . str_pad($i, 5, '0', STR_PAD_LEFT), // NIM akan seperti NIM00001, NIM00002, ...
                'Nama' => 'Mahasiswa ' . $i,
                'Alamat' => 'Alamat Mahasiswa ' . $i,
                'Nohp' => '08' . rand(100000000, 999999999),
                'Semester' => rand(1, 8), // Semester acak antara 1 sampai 8
                'id_Gol' => rand(1, 3), // id_Gol acak antara 1 sampai 3
            ]);
        }
    }
}
