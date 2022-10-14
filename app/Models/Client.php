<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'dpi',
        'nombres',
        'apellidos',
        'telefono_trabajo',
        'telefono_domiciliar',
        'celular',
        'nombres_conyugue',
        'apellidos_conyugue',
        'alquila',
        'lugar_trabajo',
        'direccion_trabajo',
        'direccion_personal',
        'correo',
        'facebook',
        'foto',
        'referencia_nombres',
        'referencia_apellidos',
        'referencia_correo',
        'referencia_telefono'
    ];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'id_client');
    }
}
