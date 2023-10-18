<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FundSubCategory;
class FundSubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [];
        for ($i = 1; $i <= 100; $i++) {
            $subCategories[] = [
                'category_id' => rand(1, 10),
                'name' => 'SubCategory' . $i,
            ];
        }

        FundSubCategory::insert($subCategories);
    }
}
