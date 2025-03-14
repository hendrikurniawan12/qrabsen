<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_users')->insert([
            ['id'=> 1,'name' => 'Admin', 'nim' => null, 'nis' => null],
            ['id'=> 2,'name' => 'Guru', 'nim' => null, 'nis' => 654321],
            ['id'=> 3,'name' => 'Siswa', 'nim' => 123456, 'nis' => null], // Contoh data siswa
        ]);
    }
}
