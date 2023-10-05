<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function AdultosDashboard()
    {
        $conteoActivo = DB::table('adultos')->where('estado_actual', 'Activo')->count();
        $conteoInactivos = DB::table('adultos')->where('estado_actual', 'Inactivo')->count();

        //$hoy = now();
        $cumplesAdultos = DB::table('adultos')
        ->where('estado_actual', 'activo')
        ->whereRaw('DATE_ADD(fecha_nacimiento, INTERVAL YEAR(CURDATE()) - YEAR(fecha_nacimiento) YEAR) >= CURDATE()')
        ->whereRaw('DATE_ADD(fecha_nacimiento, INTERVAL YEAR(CURDATE()) - YEAR(fecha_nacimiento) YEAR) <= DATE_ADD(CURDATE(), INTERVAL 30 DAY)')
        ->get();

        $cumplesPersonals = DB::table('Personals')
        ->where('estado_actual', 'activo')
        ->whereRaw('DATE_ADD(fecha_nacimiento, INTERVAL YEAR(CURDATE()) - YEAR(fecha_nacimiento) YEAR) >= CURDATE()')
        ->whereRaw('DATE_ADD(fecha_nacimiento, INTERVAL YEAR(CURDATE()) - YEAR(fecha_nacimiento) YEAR) <= DATE_ADD(CURDATE(), INTERVAL 30 DAY)')
        ->get();

        $enfermedades = DB::table('patologias')
        ->leftJoin('historials', 'patologias.historial_id', '=', 'historials.id')
        ->leftJoin('adultos', 'historials.adulto_id', '=', 'adultos.id')
        ->where('adultos.estado_actual', '!=', 'Inactivo')
        ->select('patologias.nombre_patologia', DB::raw('COUNT(*) as cantidad_repeticiones'))
        ->groupBy('patologias.nombre_patologia')
        ->get();

        $medicinas = DB::table('medicamentos')
        ->leftJoin('historials', 'medicamentos.historial_id', '=', 'historials.id')
        ->leftJoin('adultos', 'historials.adulto_id', '=', 'adultos.id')
        ->where('adultos.estado_actual', '!=', 'Inactivo')
        ->select('medicamentos.nombre_medicamento', DB::raw('COUNT(*) as cantidad_repeticiones'))
        ->groupBy('medicamentos.nombre_medicamento')
        ->get();
        $sumaMedicina = $medicinas->sum('cantidad_repeticiones');


        $datosHorarios = DB::table('personals')
        ->join('horarios', 'personals.id', '=', 'horarios.personal_id')
        ->where('personals.estado_actual', 'Activo')
        ->selectRaw('personals.primer_nombre, personals.primer_apellido, GROUP_CONCAT(CONCAT(horarios.dia, ": ", horarios.inicio, "-", horarios.final) SEPARATOR ", ") as horarios')
        ->groupBy('personals.primer_nombre', 'personals.primer_apellido')
        ->get();

    // Procesa los horarios para convertirlos en un array asociativo
    foreach ($datosHorarios as $empleado) {
        $horariosArray = [];
        $horarios = explode(', ', $empleado->horarios);
        foreach ($horarios as $horario) {
            list($dia, $horario) = explode(': ', $horario);
            list($inicio, $final) = explode('-', $horario);
            
            // Parsea las horas con Carbon para formatearlas
            $inicio = Carbon::parse($inicio)->format('H:i');
            $final = Carbon::parse($final)->format('H:i');

            $horariosArray[$dia] = "$inicio - $final";
        }
        $empleado->horarios = $horariosArray;
    }
       


        return view('dashboard', [
            'conteoActivo' => $conteoActivo,
            'conteoInactivos' => $conteoInactivos,
            'cumplesAdultos'=> $cumplesAdultos,
            'cumplesPersonals'=> $cumplesPersonals,
            'enfermedades'=>$enfermedades,
            'medicinas'=>$medicinas,
            'sumaMedicina'=>$sumaMedicina,
            'datosHorarios'=>$datosHorarios,
        ]);
    }

    public function conteoActivos()
{
    $conteoActivos = Adulto::where('estado_actual', 'Activo')->count();

    return response()->json(['conteoActivos' => $conteoActivos]);
}

public function graficaMedicinas()
{
    $medicinasGrafica = DB::table('medicamentos')
        ->leftJoin('historials', 'medicamentos.historial_id', '=', 'historials.id')
        ->leftJoin('adultos', 'historials.adulto_id', '=', 'adultos.id')
        ->where('adultos.estado_actual', '!=', 'Inactivo')
        ->select('medicamentos.nombre_medicamento', DB::raw('COUNT(*) as cantidad_repeticiones'))
        ->groupBy('medicamentos.nombre_medicamento')
        ->get();
        $sumaMedicinas = $medicinasGrafica->sum('cantidad_repeticiones');
    return response()->json(['sumaMedicinas' => $medicinasGrafica]);
}

}
