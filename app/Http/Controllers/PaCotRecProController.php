<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TCotrecpro;
use App\Models\TRecotizacion;
use App\Models\TDetalleprocot;

class PaCotRecProController extends Controller
{
	public function saveDetalleProCot($r,$idCrp)
    {
        foreach (json_decode($r->items,true) as $item) 
        {
        	// echo($item['marca']);
        	// echo '<br>';
            $tDpc=new TDetalleprocot();
            $tDpc->idCrp=$idCrp;
            $tDpc->idItm=$item['id'];
            $tDpc->marca=$item['marca'];
            $tDpc->modelo=$item['modelo'];
            $tDpc->precio=$item['precio'];
            // $tDpc->archivo=$idCrp;
            if(!$tDpc->save())
            {
                return false;
            }
        }
        // exit();
        return true;
    }
    public function actGuardar(Request $r)
    {
        // dd($r->all());
    	// return response()->json(['estado' => true, 'message' => 'Se registro la postulacion correctamente----------']);
    	$ttt = json_decode($r->items,true);
    	// dd($r->all());
    	// dd($ttt['item0']['marca']);
    	$tRec = TRecotizacion::where('idCot',$r->idCot)->where('estadoRecotizacion','1')->first();
    	if($tRec!=null)
    	{
    		$r->merge(['idRec' => $tRec->idRec]);
    	}
        $tPro = Session::get('proveedor');
        $r->merge(['idPro' => $tPro->idPro]);
    	$r->merge(['estadoCrp' => '0']);
    	$r->merge(['estado' => '1']);
        $r->merge(['fr' => Carbon::now()]);
    	DB::beginTransaction();
    	// if(TCotrecpro::create($r->all()))
    	$tCrp = TCotrecpro::create($r->all());
    	if($tCrp)
    	{
    		// $this->saveDetalleProCot($r,'3');
    		if($this->saveDetalleProCot($r,$tCrp->idCrp))
    		{
	    		DB::commit();
	    		return response()->json(['estado' => true, 'message' => 'Se registro la postulacion correctamente']);
    		}
    		else
    		{
    			DB::rollBack();
    			return response()->json(['estado' => false, 'message' => 'Error al registrar la postulacion.']);
    		}
    	}
    	else
    	{
    		DB::rollBack();
    		return response()->json(['estado' => false, 'message' => 'Error al registrar la postulacion']);
    	}
    }
    public function actListar()
    {
    	$tPro = Session::get('proveedor');
    	$registros = TCotrecpro::select('cotizacion.*','cotrecpro.fr as frCrp','cotrecpro.estadoCrp','cotrecpro.idCrp','cotrecpro.total')
            ->leftjoin('cotizacion', 'cotizacion.idCot', '=', 'cotrecpro.idCot')
            ->where('cotrecpro.idPro', $tPro->idPro)
            ->orderBy('cotrecpro.idCrp', 'desc')
            ->get();
        return response()->json(["data"=>$registros]);
    }
    // public function actSubirArchivo(Request $r)
    // {

    // }
    public function actSubirArchivo(Request $r)
    {
    	DB::beginTransaction();
    	if ($r->hasFile('file')) 
    	{
    		$archivo = $r->file('file');
            $nombreArchivo = time() . '_' . str_replace(' ', '',$archivo->getClientOriginalName());
	        if (Storage::put('public/panel_administrativo/proveedor/cotizaciones/' . $nombreArchivo, file_get_contents($archivo))) 
	        {

                $r->merge(['estadoCrp' => '1']);
	        	$r->merge(['archivo' => $nombreArchivo]);
	        	$tCrp = TCotrecpro::find($r->idCrp);
	        	// dd($r->idCrp);
	        	$tCrp->fill($r->all());
	        	// if(TCotizacion::create($r->all()))
        		if($tCrp->save())
	        	{
	        		DB::commit();
	        		return response()->json(['estado' => true, 'message' => 'Se envio la cotizacion exitosamente.']);
	        	}
	        	else
	        	{
	        		DB::rollBack();
	        		return response()->json(['estado' => false, 'message' => 'Error al registrar el envio de la cotizacion.']);
	        	}
	        } 
	        else 
	        {
	        	DB::rollBack();
	        	return response()->json(['estado' => false, 'message' => 'Error al guardar el archivo de cotizacion']);
	        }
        }
        DB::rollBack();
        return response()->json(['estado' => false, 'message' => 'Ingrese un archivo de cotización.']);
    }
    public function verArchivo($nombreArchivo)
    {
        $rutaArchivo = storage_path('app/public/panel_administrativo/proveedor/cotizaciones/' . $nombreArchivo);
        if (file_exists($rutaArchivo)) 
            return response()->file($rutaArchivo);
        else 
            abort(404); 
    }
}
