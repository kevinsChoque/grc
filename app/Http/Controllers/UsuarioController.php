<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TUsuario;


class UsuarioController extends Controller
{
    public function actGuardar(Request $r)
    {
        $existeDni = TUsuario::where('dni',$r->dni)->where('estado','1')->first();
        if($existeDni!=null)
        {
            return response()->json(['estado' => false, 'message' => 'El numero de DNI: '.$r->dni.' ya fue registrado.']);
        }
        
     //    $r->merge(['estadoCotizacion' => 1]);
    	// $r->merge(['archivo' => $nombreArchivo]);
        $r->merge(['password' => Hash::make($r->password)]);
    	$r->merge(['estado' => '1']);
        $r->merge(['fr' => Carbon::now()]);
    	DB::beginTransaction();
    	if(TUsuario::create($r->all()))
    	{
    		DB::commit();
    		return response()->json(['estado' => true, 'message' => 'Usuario registrado correctamente']);
    	}
    	else
    	{
    		DB::rollBack();
    		return response()->json(['estado' => false, 'message' => 'Error al registrar el usuario']);
    	}
    }
    public function actListar()
    {
        $registros = TUsuario::orderBy('idUsu', 'desc')->get();
        return response()->json(["data"=>$registros]);
    }
    public function actEliminar(Request $r)
    {
        $tUsu = TUsuario::find($r->id);
        $tUsu->estado = 0;
        if($tUsu->save())
            return response()->json(["estado"=>true, "message"=>"Operacion exitosa."]);
        else
            return response()->json(["estado"=>false, "message"=>"No se pudo proceder.",]);
    }
    public function actEditar(Request $r)
    {
        $registro = TUsuario::find($r->id);
        return response()->json(["data"=>$registro]);
    }
    public function actGuardarCambios(Request $r)
    {
        $tUse = TUsuario::find($r->idUsu);
        if($r->dni!=$tUse->dni)
        {
            $existeDni = TUsuario::where('dni', $r->dni)->first();
            if($existeDni!=null)
                return response()->json(['estado' => false, 'message' => 'El numero de DNI: '.$r->dni.' ya fue registrado.']);
        }
        // dd($r->password!=null);
        if($r->password!=null)
        {
            $r->merge(['password' => Hash::make($r->password)]);
        }
        $r->merge(['fa' => Carbon::now()]);
        $tUse->fill($r->all());
        if($tUse->save())
            return response()->json(['estado' => true, 'message' => 'Operacion exitosa.']);
        else
            return response()->json(['estado' => false, 'message' => 'Ocurrio un error.']);
    }
}
