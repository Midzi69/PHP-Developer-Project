<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class FundExport implements FromCollection
{
    protected $funds;

    public function __construct($funds)
    {
        $this->funds = $funds;
    }

    public function collection()
    {
        return collect($this->funds);
    }
}
