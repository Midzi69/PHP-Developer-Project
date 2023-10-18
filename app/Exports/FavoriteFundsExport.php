<?php

namespace App\Exports;

use App\Models\Fund;
use Maatwebsite\Excel\Concerns\FromCollection;

class FavoriteFundsExport implements FromCollection
{
    public function collection()
    {
        $user = auth()->user();
        $favoriteFunds = $user->favoriteFunds()->get();

        return $favoriteFunds;
    }
}
