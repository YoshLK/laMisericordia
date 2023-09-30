<?php

namespace App\Http\Controllers;

use App\Models\Referencia;
use Illuminate\Http\Request;


class ReferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('referencia');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('referencia/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $campos=[
            'primer_nombre'=>'required|string|max:20',
            'segundo_nombre'=>'required|string|max:50',
            'primer_apellido'=>'required|string|max:20',
            'segundo_apellido'=>'required|string|max:50',
            'telefono'=>'required|string|max:25',
            'direccion'=>'required|string|max:150',
            'adulto_id'=>'required|string',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReferencia = request()->except('_token');
        
        Referencia::insert($datosReferencia);
        return redirect('/general/adulto_detalle/'.$request->adulto_id)->with('mensaje', 'registrado');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Referencia $referencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $referencia=Referencia::findOrFail($id);
        return view( '/general/adulto_detalle/'.$request->adulto_id , compact('referencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'primer_nombre'=>'required|string|max:20',
            'segundo_nombre'=>'required|string|max:50',
            'primer_apellido'=>'required|string|max:20',
            'segundo_apellido'=>'required|string|max:50',
            'telefono'=>'required|string|max:25',
            'direccion'=>'required|string|max:150',
        ];

        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosReferencia = request()->except(['_token','_method']);
        Referencia::where('id','=',$id)->update($datosReferencia);
        $referencia=Referencia::findOrFail($id);    
        return redirect( '/general/adulto_detalle/'.$request->adulto_id)->with('mensaje','editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $referencia=Referencia::findOrFail($id);
        Referencia::destroy($id);
        return redirect('/general/adulto_detalle/'.$referencia->adulto_id)->with('mensaje','eliminado');
    }
}
