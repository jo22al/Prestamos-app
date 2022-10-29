<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_prestamo',
        'monto',
        'mora',
        'fecha_pago',
        'tipo_de_evidencia',
        'img_deposito',
        'saldo_anterior',
        'nuevo_saldo'
    ];
}
