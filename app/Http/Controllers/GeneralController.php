<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adulto;
use App\Models\Referencia;

class GeneralController extends Controller
{
    
    public function index()  
    {       
        //$adulto=Adulto::where('id','=',$id)->first();
        return view('general.adulto_detalle');
    }

    public function ver($id)  
    {       
        $adulto=Adulto::where('id','=',$id)->first();
        $datos['referencias']=Referencia::where('adulto_id','=',$id)->get();
        
        return view('general.adulto_detalle',$datos, compact('adulto'));
        
    }

    


}
