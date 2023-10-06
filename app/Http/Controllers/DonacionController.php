<?php

namespace App\Http\Controllers;

use App\Models\Donacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donaciones = DB::table('donacions')
        ->join('donadors', 'donacions.donador_id', '=', 'donadors.id')
        ->select('donacions.*', 'donadors.nombre_donador')
        ->get();
        return view('donacion.index', [
            'donaciones' => $donaciones,
        ]); 
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
        $donacion = new Donacion();
        $donacion->tipo_donacion = $request->input('tipo_donacion');
        $donacion->cantidad = $request->input('cantidad');
        $donacion->descripcion = $request->has('descripcion') ? $request->input('descripcion') : null;
        $donacion->donador_id = $request->input('donador_id');
        $donacion->save();
        
        return redirect('donador')->with('mensaje', 'registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donacion $donacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donacion $donacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'tipo_donacion'=>'required|string|max:100',
            'cantidad'=>'required|string|max:200',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosDonacion = request()->except('_token','_method');
        Donacion::where('id','=',$id)->update($datosDonacion);
        $donacion=Donacion::findOrFail($id);    
        return redirect()->route('donacion.index')->with('mensaje', 'editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donacion $donacion)
    {
        //
    }
}
