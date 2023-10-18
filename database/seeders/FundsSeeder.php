<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fund;
class FundsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $funds = [];
        for ($i = 1; $i <= 10000; $i++) {
            $funds[] = [
                'name' => 'Fund ' . $i,
                'fund_category_id' => rand(1, 10),
                'fund_sub_category_id' => rand(1, 100),
                'isin' => 'ISIN' . str_pad($i, 9, '0', STR_PAD_LEFT),
                'wkn' => 'WKN' . str_pad($i, 6, '0', STR_PAD_LEFT),
            ];
        }

        Fund::insert($funds);
    }
}
