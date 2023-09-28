<?php

namespace App\Http\Controllers;

use App\Models\Adulto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdultoController extends Controller
{
    // leer VER todos los registros
    public function index()  
    {       
        $datos['adultos']=Adulto::paginate(100); //traer 5 empleados
        return view('adulto.index',$datos); //pasando datos a la vista
    }

    // abrir formulario para un nuevo registro
    public function create()
    {
        return view('adulto.create');
    }

    //Recibe datos Guardar en la DB
    public function store(Request $request)
    {
        //validacion de campos
        $campos=[
            'primer_nombre'=>'required|string|max:20',
            'segundo_nombre'=>'required|string|max:50',
            'primer_apellido'=>'required|string|max:20',
            'segundo_apellido'=>'required|string|max:50',
            'fecha_ingreso'=>'required|date',
            'DPI'=>'required|string|max:13',
            'procedencia'=>'required|string|max:100',
            'fecha_nacimiento'=>'required|date',
            'edad'=>'required|integer',
            'estado_actual'=>'required|string|max:25',
            'foto'=>'mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];

        $this->validate($request, $campos, $mensaje);
        
        //$datoAdulto = request()->all();
        $datosAdulto = request()->except('_token');
       
        if ($request->hasFile('foto')){
            $datosAdulto['foto'] = $request->file('foto')->store('uploads','public');
        }
        //$a = $request->referencias;
        //print_r($a);
        Adulto::insert($datosAdulto);
        //return response()->json($datosAdulto );
        return redirect('adulto')->with('mensaje','registrado');
        
    }

    // Visualizar detalle de un solo registro
    public function show(int $id)
    {
        $adulto=Adulto::where('id','=',$id)->first();
        return view('adulto.show', compact('adulto'));
    }

     // abrir formulario para edicion
    public function edit($id)
    {
        $adulto=Adulto::findOrFail($id);
        return view('adulto.edit', compact('adulto'));
    }

    // Actualizar la informacion editada
    public function update(Request $request, $id)
    {
        $campos=[
            'primer_nombre'=>'required|string|max:20',
            'segundo_nombre'=>'required|string|max:50',
            'primer_apellido'=>'required|string|max:20',
            'segundo_apellido'=>'required|string|max:50',
            'fecha_ingreso'=>'required|date',
            'DPI'=>'required|string|max:13',
            'procedencia'=>'required|string|max:100',
            'fecha_nacimiento'=>'required|date',
            'edad'=>'required|integer',
            'estado_actual'=>'required|string|max:25',
            'foto'=>'mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);

        $datosAdulto = request()->except(['_token','_method']);
        
        if ($request->hasFile('foto')){
            $adulto=Adulto::findOrFail($id);
            Storage::delete('public/'.$adulto->foto);
            $datosAdulto['foto'] = $request->file('foto')->store('uploads','public');
        }
        
        Adulto::where('id','=',$id)->update($datosAdulto);
        $adulto=Adulto::findOrFail($id);
        return redirect('adulto')->with('mensaje','editado');
    }

    // eliminar registro
    public function destroy($id)
    {
        $adulto=Adulto::findOrFail($id);
        if (Storage::delete('public/'.$adulto->foto)){
            Adulto::destroy($id);
        }else if ($adulto->id=$id){
            Adulto::destroy($id);
        }
        return redirect('adulto')->with('mensaje','eliminado');
    }
}
