<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    use HasFactory;
    public function adultosDatos(){
        //relacion uno a muchos
        return $this->belongsTo(Adulto::class, 'adulto_id');
    } 

}
