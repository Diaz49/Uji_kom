<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengampuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengampu')->insert([
            ['Kode_mk' => 'CS101', 'NIP' => '111111111'],
            ['Kode_mk' => 'CS102', 'NIP' => '222222222'],
        ]);
    }
}
