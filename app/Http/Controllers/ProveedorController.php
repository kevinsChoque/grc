<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TProveedor;

class ProveedorController extends Controller
{
    public function actRegistrar()
    {
    	echo('cascascasc');exit();
    }
    public function actGuardar(Request $r)
    {
        $existeNumeroDocumento = TProveedor::where('numeroDocumento',$r->numeroDocumento)->where('estado','1')->first();
        if($existeNumeroDocumento!=null)
        {
            return response()->json(['estado' => false, 'message' => 'El Proveedor con numero de documento: '.$r->numeroDocumento.' ya fue registrado.']);
        }
        $r->merge(['estadoProveedor' => '1']);
    	$r->merge(['estado' => '1']);
        $r->merge(['fr' => Carbon::now()]);
    	DB::beginTransaction();
    	if(TProveedor::create($r->all()))
    	{
    		DB::commit();
    		return response()->json(['estado' => true, 'message' => 'Proveedor registrado correctamente.']);
    	}
    	else
    	{
    		DB::rollBack();
    		return response()->json(['estado' => false, 'message' => 'Error al registrar al proveedor.']);
    	}
    }
    public function actListar()
    {
        $registros = TProveedor::orderBy('idPro', 'desc')->get();
        return response()->json(["data"=>$registros]);
    }
    public function actEliminar(Request $r)
    {
        $tPro = TProveedor::find($r->id);
        $tPro->estado = 0;
        if($tPro->save())
            return response()->json(["estado"=>true, "message"=>"Operacion exitosa."]);
        else
            return response()->json(["estado"=>false, "message"=>"No se pudo proceder.",]);
    }
    public function actEditar(Request $r)
    {
        $registro = TProveedor::find($r->id);
        return response()->json(["data"=>$registro]);
    }
}
