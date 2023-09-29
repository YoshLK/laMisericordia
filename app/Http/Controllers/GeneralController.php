<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adulto;

class GeneralController extends Controller
{
    
    public function index()  
    {       
        //$adulto=Adulto::where('id','=',$id)->first();
        return view('general.adulto_detalle');
    }

    public function verReferencias($id)  
    {       
        $adulto=Adulto::where('id','=',$id)->first();
        return view('general.adulto_detalle', compact('adulto'));
    }

    
}
