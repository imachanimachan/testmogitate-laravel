<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Season;
//use Illuminate\Support\Facades\DB;
//se Illuminate\Support\Carbon;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [ "春", "夏" , "秋" , "冬" ];

        foreach ($names as $name) {
            Season::create(['name' => $name]);
        }
    }
}
