<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserFunds;
class UserFundsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userFunds = [];
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                $userFunds[] = [
                    'user_id' => $i,
                    'fund_id' => rand(1, 10000),
                ];
            }
        }

        UserFunds::insert($userFunds);
    }
}
