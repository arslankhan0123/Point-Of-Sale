<?php

namespace App\Exports;

use App\Models\ShoppingCart;
use Maatwebsite\Excel\Concerns\FromCollection;

class TableExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ShoppingCart::all();
    }
}
