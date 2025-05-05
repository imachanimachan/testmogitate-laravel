<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [ "春", "夏" , "秋" , "冬" ];

        foreach ($names as $name) {
            DB::table('seasons')->insert([
                'name' => $name,
            ]);
        }
    }
}
