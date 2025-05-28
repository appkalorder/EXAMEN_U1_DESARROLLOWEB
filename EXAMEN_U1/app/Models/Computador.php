<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computador extends Model
{
    use HasFactory;

    protected $table = 'computadores';
    
    protected $fillable = [
        'codigo_tienda',
        'almacenamiento',
        'RAM',
        'tarjeta_grafica',
        'precio',
        'descripcion',
        'imagen',
        'procesador'
    ];
}