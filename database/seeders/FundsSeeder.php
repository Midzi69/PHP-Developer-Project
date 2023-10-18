<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fund;
use Illuminate\Support\Facades\DB;

class FundsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DB::table('fund_categories')->pluck('id')->toArray();
        $subcategories = DB::table('fund_sub_categories')->pluck('id')->toArray();

        foreach (range(1, 10000) as $index) {
            DB::table('funds')->insert([
                'name' => "Fund {$index}",
                'fund_category_id' => $categories[array_rand($categories)],
                'fund_sub_category_id' => $subcategories[array_rand($subcategories)],
                'isin' => "ISIN{$index}",
                'wkn' => "WKN{$index}",
            ]);
        }
    }
}
