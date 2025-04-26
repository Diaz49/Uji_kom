<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen')->insert([
            ['NIP' => '111111111', 'Nama' => 'Dr. Albert', 'Alamat' => 'Jalan Dosen', 'Nohp' => '083345678901'],
            ['NIP' => '222222222', 'Nama' => 'Prof. Mary', 'Alamat' => 'Jalan Ilmu', 'Nohp' => '082123456789'],
        ]);
    }
}
