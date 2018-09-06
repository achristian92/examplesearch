<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\destination;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(){
        $destinations = Destination::all();
        return view('welcome',compact('destinations'));
    }
    public function cargarcitios($destion){
        $cargarcitios = DB::table('cities')->select('name')->where('destionation_id', '=', $destion)->get();
        echo json_encode($cargarcitios);
    }
    public function cargar_fecha_nrodias($destinations){
        $cargarcitios2 = DB::table('cities')->select('fecha_salida', 'nro_dias')->where('name', '=', $destinations)->get();
        echo json_encode($cargarcitios2);
    }
}
