<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\destination;
use App\city;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(Request $request){
        if($request->citiesname !== null){
            $dato = $request->get('citiesname');
       
            $packages = city::popular($dato)->paginate(2);
            return redirect()->route('page.search',compact('packages'));

        }else{
           
       
        $destinations = Destination::all();
        return view('welcome',compact('destinations'));
    
        }
    }
    public function cargarcitios($destion){
        $cargarcitios = DB::table('cities')->select('name')->where('destionation_id', '=', $destion)->get();
        echo json_encode($cargarcitios);
    }
    public function cargar_fecha_nrodias($destinations){
        $cargarcitios2 = DB::table('cities')->select('fecha_salida', 'nro_dias')->where('name', '=', $destinations)->get();
        echo json_encode($cargarcitios2);
    }

    public function search(Request $request){
       // $packages = city::polular()
       
       $dato = $request->get('citiesname');
       $fecha = $request->get('fechaname');
       
        $packages = city::popular($dato)->fecha($fecha)->paginate(1);
        
        return  view('result_search',compact('packages','dato','fecha'));
    }

}

