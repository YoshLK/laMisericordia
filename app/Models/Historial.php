<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    ///Relacion uno a uno adulto
    public function adultoDatos(){
     
        return $this->belongsTO(Adulto::class);
    }

    //relacion uno a muhcos historial a Patologia
    public function patologiasDatos(){
        return $this->hasMany(Patologia::class);
    } 
}


