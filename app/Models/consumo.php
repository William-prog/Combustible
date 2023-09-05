<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consumo extends Model
{
    use HasFactory;

    protected $fillable = [
        'placas',
        'numeroTicket',
        'descripcion',
        'numeroVale',
        'CC',
        'fecha',

        'operador',
        'producto',
        'litros',
        'precioLitro',
        'total'
    ];
}
