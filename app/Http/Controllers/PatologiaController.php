<?php

namespace App\Http\Controllers;

use App\Models\Patologia;
use Illuminate\Http\Request;

class PatologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patologia/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre_patologia'=>'required|string|max:50',
            'fecha_diagnostico'=>'date|required',
            'gravedad'=>'required|string|max:25',
            'tratamiento_actual'=>'required|string|max:150',
            'notas_patologia'=>'nullable|string',
            'historial_id'=>'required|integer',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosPatologia = request()->except('_token','adulto_id');
        Patologia::insert($datosPatologia);
        return redirect('/general/adulto_detalle/'.$request->adulto_id)->with('patologia', 'registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patologia=Patologia::findOrFail($id);
        return view( '/general/adulto_detalle/'.$request->adulto_id , compact('patologia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre_patologia'=>'required|string|max:50',
            'fecha_diagnostico'=>'date|required',
            'gravedad'=>'required|string|max:25',
            'tratamiento_actual'=>'required|string|max:150',
            'notas_patologia'=>'nullable|string',
            'historial_id'=>'required|integer',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosPatologia = request()->except(['_token','_method','adulto_id']);
        Patologia::where('id','=',$id)->update($datosPatologia);
        $patologia=Patologia::findOrFail($id);    
        return redirect( '/general/adulto_detalle/'.$request->adulto_id)->with('patologia','editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }


   // app/Http/Controllers/MiControlador.php


    public function eliminar(Request $request)
    {
        $id = $request->input('id');
        $ruta = $request->input('ruta');
        $patologia=Patologia::findOrFail($id);
        Patologia::destroy($id);
        return redirect('/general/adulto_detalle/'.$ruta)->with('patologia','eliminado');
    }

}