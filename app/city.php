<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    
    public function scopePopular($query, $datos)
    {
        return $query->where('name', $datos);
    }
    public function scopeFecha($query, $fecha)
    {
        return $query->where('fecha_salida', $fecha);
    }
}
