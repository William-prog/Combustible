<?php

namespace App\Imports;

use App\Models\consumo;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportConsumo implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
{
    
        return new consumo([
            'id' => $row[0],
            'placas' => $row[6],
            'numeroTicket' => $row[2],
            'descripcion' => $row[3],
            'numeroVale' => $row[4],
            'CC' => $row[5],
            'fecha' => $row[1],
            
            'operador' => $row[7],
            'producto' => $row[8],
            'litros' => $row[9],
            'precioLitro' => $row[10],
            'total' => $row[11]
        ]);
        
        
}
}
