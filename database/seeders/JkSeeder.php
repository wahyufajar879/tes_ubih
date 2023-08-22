<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jeniskelamins')->insert([
            'id'=>'1',
            'jenis_kelamin'=>'Laki-Laki'
        ]);
        DB::table('jeniskelamins')->insert([
            'id'=>'2',
            'jenis_kelamin'=>'Perempuan'
        ]);
    }
}
