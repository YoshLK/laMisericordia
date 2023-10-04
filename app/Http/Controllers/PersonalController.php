<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['personals'] = Personal::where('estado_actual', 'Activo')->get(); 
        return view('personal.index',$datos); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personal.create');
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
            'DPI'=>'required|string|max:13',
            'foto'=>'mimes:jpeg,png,jpg',
            'fecha_nacimiento'=>'required|date',
            'edad'=>'required|integer',
            'fecha_contratacion'=>'required|date',
            'direccion'=>'required|string|max:150',
            'telefono'=>'required|string|max:25',
            'titulo'=>'required|string|max:50',
            'cargo'=>'required|string|max:50',
            'salario'=>'required|integer',
            'cargo'=>'required|string|max:20',
            'sat'=>'required|string|max:150',
            'estado_actual'=>'required|string|max:20',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosPersonal = request()->except('_token');

        if ($request->hasFile('foto')){
            $datosPersonal['foto'] = $request->file('foto')->store('uploads','public');
        }
        
        Personal::insert($datosPersonal);
        return redirect('personal')->with('mensaje','registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $personal=Personal::findOrFail($id);
        return view('personal.edit', compact('personal'));
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
            'DPI'=>'required|string|max:13',
            'foto'=>'mimes:jpeg,png,jpg',
            'fecha_nacimiento'=>'required|date',
            'edad'=>'required|integer',
            'fecha_contratacion'=>'required|date',
            'direccion'=>'required|string|max:150',
            'telefono'=>'required|string|max:25',
            'titulo'=>'required|string|max:50',
            'cargo'=>'required|string|max:50',
            'salario'=>'required|integer',
            'cargo'=>'required|string|max:20',
            'sat'=>'required|string|max:150',
            'estado_actual'=>'required|string|max:20',
        ];

        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];

        $this->validate($request, $campos, $mensaje);
        $datosPersonal = request()->except('_token','_method');

        if ($request->hasFile('foto')){
            $personal=Personal::findOrFail($id);
            Storage::delete('public/'.$personal->foto);
            $datosPersonal['foto'] = $request->file('foto')->store('uploads','public');
        }

        Personal::where('id','=',$id)->update($datosPersonal);
        $personal=Personal::findOrFail($id);
        return redirect('personal')->with('mensaje','editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $ruta = $request->input('ruta');
        $id = $request->input('id');
        $personal=Personal::findOrFail($id);
        if (Storage::delete('public/'.$personal->foto)){
            Personal::destroy($id);
        }else if ($personal->id=$id){
            Personal::destroy($id);
        }
        $rutaDireccion = $ruta ? 'personal.' . $ruta : 'personal.index';
        return redirect()->route($rutaDireccion)->with('mensaje', 'eliminado');
    }
}
