<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('golongan')->insert([
            ['id_Gol' => 1, 'nama_Gol' => 'A'],
            ['id_Gol' => 2, 'nama_Gol' => 'B'],
            ['id_Gol' => 3, 'nama_Gol' => 'C'],
        ]);
    }
}
