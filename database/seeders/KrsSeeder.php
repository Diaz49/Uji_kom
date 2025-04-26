<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('krs')->insert([
            ['NIM' => '123456789', 'Kode_mk' => 'CS101'],
            ['NIM' => '987654321', 'Kode_mk' => 'CS102'],
        ]);
    }
}
