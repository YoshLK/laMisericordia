<?php

namespace App\Http\Controllers;
use DateTime;
use App\Models\Adulto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdultoController extends Controller
{
    // leer VER todos los registros
    public function index()  
    {       
        $datos['adultos'] = Adulto::where('estado_actual', 'Activo')->get();
    
        foreach ($datos['adultos'] as $adulto)
    {
        $fechaInicio = new DateTime($adulto->fecha_ingreso);
        $fechaFinal = empty($adulto->fecha_salida) ? new DateTime() : new DateTime($adulto->fecha_salida);
        $diferencia = $fechaInicio->diff($fechaFinal);

        $anios = floor($diferencia->days / 365);
        $meses = floor(($diferencia->days % 365) / 31);
        $dias_restantes = ($diferencia->days % 365) % 31;

        if ($anios != 0) {
            $aniosText = $anios . ' Años ';
        } else {
            $aniosText = "";
        }
        
        if ($meses != 0) {
            $mesesText = $meses . ' Meses ';
        } else {
            $mesesText = "";
        }
        $conteoTiempo[] = $aniosText . $mesesText . $dias_restantes ." Dias";
    }
        return view('adulto.index',$datos,compact('conteoTiempo'));    
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
    public function show(Adulto $adulto)
    {
        //$adulto=Adulto::where('id','=',$id)->first();
        //return view('adulto.inactivo');
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
    public function destroy(Request $request)
    {   
        $ruta = $request->input('ruta');
        $id = $request->input('id');
        $adulto=Adulto::findOrFail($id);
        if (Storage::delete('public/'.$adulto->foto)){
            Adulto::destroy($id);
        }else if ($adulto->id=$id){
            Adulto::destroy($id);
        }
        $rutaDireccion = $ruta ? 'adulto.' . $ruta : 'adulto.index';
        return redirect()->route($rutaDireccion)->with('mensaje', 'eliminado');
    } 

    //inactivo
    public function inactivo()
{
    $adultosInactivos = Adulto::where('estado_actual', 'Inactivo')->get();
    return view('adulto.inactivo', compact('adultosInactivos'));
}
}
