<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genes')->insert([
            ['name' => 'Hành động'],
            ['name' => 'Võ thuật'],
            ['name' => 'Lãng mạng'],
        ]);
    }
}
