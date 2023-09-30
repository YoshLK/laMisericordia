<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('historial/create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('historial/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'peso'=>'required',
            'altura'=>'required',
            'tronco'=>'required|string|max:5',
            'piernas'=>'required|integer',
            'calzado'=>'required|integer',
            'dificultad_motora'=>'nullable|string|max:150',
            'adulto_id'=>'required|integer',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);

        $datosHistorial = request()->except('_token');
        
        Historial::insert($datosHistorial);
        return redirect('/general/adulto_detalle/'.$request->adulto_id)->with('mensaje', 'registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Historial $historial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $historial=Historial::findOrFail($id);
        return view( '/general/adulto_detalle/'.$request->adulto_id , compact('historial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'peso'=>'required',
            'altura'=>'required',
            'tronco'=>'required|string|max:5',
            'piernas'=>'required|integer',
            'calzado'=>'required|integer',
            'dificultad_motora'=>'nullable|string|max:150',
            'adulto_id'=>'required|integer',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosHistorial = request()->except(['_token','_method']);
        Historial::where('id','=',$id)->update($datosHistorial);
        $historial=Historial::findOrFail($id);    
        return redirect( '/general/adulto_detalle/'.$request->adulto_id)->with('mensaje','editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Historial $historial)
    {
        //
    }
}
