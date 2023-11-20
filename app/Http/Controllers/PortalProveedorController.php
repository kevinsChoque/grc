<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Mail\EmailProveedor;

use App\Models\TProveedor;

class PortalProveedorController extends Controller
{
    public function actGuardar(Request $r)
    {
        // dd($r->all());
        $existeNumeroDocumento = TProveedor::where('numeroDocumento',$r->ruc)->first();
        if($existeNumeroDocumento!=null)
            return response()->json(['estado' => false, 'message' => 'El Proveedor con numero de documento: '.$r->numeroDocumento.' ya fue registrado.']);
        $r->merge(['usuario' => $r->numeroDocumento]);
        // $r->merge(['password' => Hash::make($r->numeroDocumento)]);
        $password = Str::random(8);
        $r->merge(['password' => Hash::make($password)]);
        $r->merge(['estadoProveedor' => '1']);
    	$r->merge(['estado' => '1']);
        $r->merge(['passwrodPro' => $password]);
        $r->merge(['fr' => Carbon::now()]);
        $datosProveedor = ['usuario' => $r->ruc, 'password' => $password];
    	// DB::beginTransaction();
    	// if(TProveedor::create($r->all()))
    	// {
     //        $destinatario = 'kevins.choque@gmail.com';
     //        Mail::to($destinatario)->send(new EmailProveedor($datosProveedor));

    	// 	DB::commit();
    	// 	return response()->json(['estado' => true, 'message' => 'Su usuario y contraseñase se le envio a su correo '.$r->correo.'.']);
    	// }
    	// else
    	// {
    	// 	DB::rollBack();
    	// 	return response()->json(['estado' => false, 'message' => 'Error al registrar al proveedor.']);
    	// }

        try 
        {
            DB::beginTransaction();
            TProveedor::create($r->all());
            Mail::to('kevins.choque@gmail.com')->send(new EmailProveedor($datosProveedor));
            DB::commit();
            return response()->json(['estado' => true, 'message' => 'Su usuario y contraseñase se le envio a su correo '.$r->correo.'.']);
        } 
        catch (Exception $e) 
        {
            DB::rollBack();
            return response()->json(['estado' => false, 'message' => 'Ocurrio un error porfavor contactese con el Administrador.']);
        }
    }
}
