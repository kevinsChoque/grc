<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TCotizacion;

class PaCotizacionController extends Controller
{
    public function actListar()
    {
    	$registros = TCotizacion::where('estadoCotizacion','2')->orderBy('fr','desc')->get();
        return response()->json(["data"=>$registros]);
    }
}
