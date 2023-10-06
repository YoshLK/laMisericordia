<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;
    
    public function donadoresDatos(){
        return $this->belongsTo(Donador::class, 'donador_id');
    } 

}
