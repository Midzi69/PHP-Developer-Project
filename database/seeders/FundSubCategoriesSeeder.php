<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FundSubCategory;
use Illuminate\Support\Facades\DB;
class FundSubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DB::table('fund_categories')->pluck('id')->toArray();

        foreach (range(1, 100) as $index) {
            DB::table('fund_sub_categories')->insert([
                'category_id' => $categories[array_rand($categories)],
                'name' => "SubCategory{$index}",
            ]);
        }
    }
}
