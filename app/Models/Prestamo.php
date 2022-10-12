<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'monto',
        'monto_cuota',
        'interes_seleccionado',
        'interes',
        'saldo',
        'fecha_pago',
        'periocidad_pago',
        'img_auto',
        'estado_prestamo',
        'mora',
        'id_client'
    ];

    public function client() {
        return $this->belongsTo(Client::class, 'id_client');
    }
}
