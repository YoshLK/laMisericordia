<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adulto;
use App\Models\Patologia;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function AdultosDashboard()
    {
        $conteoActivos = Adulto::where('estado_actual', 'Activo')->count();
        $conteoInactivos = Adulto::where('estado_actual', 'Inactivo')->count();

        $hoy = now();
        $cumples = Adulto::select('*')
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

        return view('dashboard', [
            'conteoActivos' => $conteoActivos,
            'conteoInactivos' => $conteoInactivos,
            'cumples'=> $cumples,
            'enfermedades'=>$enfermedades,
        ]);
    }

}
