<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adulto;
use App\Models\Personal;

class GeneralController extends Controller
{
    
    public function index()  
    {       
        //$adulto=Adulto::where('id','=',$id)->first();
        //return view('general.adulto_detalle');
    }

    public function verAdulto($id)  
    {       
        $adulto=Adulto::where('id','=',$id)->first();
        return view('general.adulto_detalle', compact('adulto'));
    }

    public function verPersonal($id)  
    {       
        $personal=Personal::where('id','=',$id)->first();
        return view('general.personal_detalle', compact('personal'));
    }

    
}
