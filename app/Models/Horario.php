<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    
    public function personalDatos(){
        return $this->belongsTo(Personal::class, 'personal_id');
    } 
}
