<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ruang')->insert([
            ['id_ruang' => 1, 'nama_ruang' => 'Ruang 101'],
            ['id_ruang' => 2, 'nama_ruang' => 'Ruang 102'],
        ]);
    }
}
