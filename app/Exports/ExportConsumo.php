<?php

namespace App\Exports;

use App\Models\consumo;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportConsumo implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return consumo::all();
    }
}
