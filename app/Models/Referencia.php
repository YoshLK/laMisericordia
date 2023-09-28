<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    use HasFactory;
    public function Adultos(){
        return $this->belongsTo(Adulto::class, 'adulto_id');
    } 

    static $rules=[
        'adulto_id'=>'required',
        'primer_nombre'=>'required',
        'segundo_nombre'=>'required'   
    ];

    //datos que se trabajan
    protected $fillable=['adulto_id','primer_nombre','segundo_nombre'];
}
