<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FundCategory;
class FundCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FundCategory::insert([
            ['name' => 'Category1'],
            ['name' => 'Category2'],
            ['name' => 'Category3'],
            ['name' => 'Category4'],
            ['name' => 'Category5'],
            ['name' => 'Category6'],
            ['name' => 'Category7'],
            ['name' => 'Category8'],
            ['name' => 'Category9'],
            ['name' => 'Category10'],
            
        ]);
    }
}
