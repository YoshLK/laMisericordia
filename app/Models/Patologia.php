<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patologia extends Model
{
    use HasFactory;

    public function historialDatos(){
        //relacion uno a muchos
        return $this->belongsTo(Historial::class, 'historial_id');
    } 
}
