<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Season;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(ProductsTableSeeder::class);
        $this->call(SeasonsTableSeeder::class);

        $products = Product::all();
        $seasons = Season::all();

        $map = [
            'キウイ' => ['秋', '冬'],
            'ストロベリー' => ['春'],
            'オレンジ' => ['冬'],
            'スイカ' => ['夏'],
            'ピーチ' => ['夏'],
            'シャインマスカット' => ['夏' , '秋'],
            'パイナップル' => ['春' , '夏'],
            'ブドウ' => ['夏' ,'秋'],
            'バナナ' => ['夏'],
            'メロン' => ['春' , '夏']
        ];

        foreach ($map as $productName => $seasonNames) {
            $product = $products->where('name', $productName)->first();
            $seasonIds = $seasons->whereIn('name', $seasonNames)->pluck('id')->toArray();

            foreach ($seasonIds as $seasonId) {
                DB::table('product_season')->insert([
                    'product_id' => $product->id,
                    'season_id' => $seasonId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }

}
