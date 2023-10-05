<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'dia'=>'required|string|max:20',
            'inicio'=>'required|date_format:H:i',
            'final'=>'required|date_format:H:i',
            'personal_id'=>'required|string',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);

        $datosHorario = request()->except('_token');
        
        Horario::insert($datosHorario);
        return redirect('/general/personal_detalle/'.$request->personal_id)->with('mensaje', 'registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'dia'=>'required|string|max:20',
            'inicio'=>'required',
            'final'=>'required',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);

        $datosHorario = request()->except('_token','_method');
        Horario::where('id','=',$id)->update($datosHorario);
        $hoario=Horario::findOrFail($id);    
        return redirect( '/general/personal_detalle/'.$request->personal_id)->with('mensaje','editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hoario=Horario::findOrFail($id);
        Horario::destroy($id);
        return redirect('/general/personal_detalle/'.$hoario->personal_id)->with('mensaje','eliminado');
    }
}
