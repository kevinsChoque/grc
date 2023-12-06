<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\TCotrecpro;
use App\Models\TRecotizacion;
use App\Models\TDetalleprocot;

// use Codedge\Fpdf\Fpdf\Fpdf;
use Codedge\Fpdf\Fpdf\Fpdf;
// use setasign\Fpdi\Fpdi;

class PaCotRecProController extends Controller
{
    public $arrayNombresFiles= array();

	public function saveDetalleProCot($r,$idCrp)
    {
        $i=1;
        foreach (json_decode($r->items,true) as $item) 
        {
            $tDpc=new TDetalleprocot();
            $tDpc->idCrp=$idCrp;
            $tDpc->idItm=$item['id'];
            $tDpc->garantia=$item['garantia'];
            $tDpc->marca=$item['marca'];
            $tDpc->modelo=$item['modelo'];
            $tDpc->precio=$item['precio'];
            
            // $tDpc->archivo=$idCrp;
            if($item['archivo']!='no tiene')
            {
                // $this->arrayNombresFiles = array();
                $tDpc->archivo=$idCrp.'_'.$i.'.pdf';
                array_push($this->arrayNombresFiles, $idCrp.'_'.$i);
            }
            if(!$tDpc->save())
            {return false;}
            $i++;
        }
        return true;
    }
    public function actGuardar(Request $r)
    {
        // dd($r->all());

        // if ($r->hasFile('pdfDj')) 
        // {
        //     $archivo = $r->file('pdfDj');
        //     $nombreArchivo = time() . '_' . str_replace(' ', '',$archivo->getClientOriginalName());
        //     if (Storage::put('public/juntarPdfs/' . $nombreArchivo, file_get_contents($archivo))) 
        //     {
                
        //     } 
        //     else 
        //     {
        //         DB::rollBack();
        //         return response()->json(['estado' => false, 'message' => 'Error al guardar el archivo, no se registro la cotización']);
        //     }
        // }
        // --------------------------
        // $arc = $r->file('archivos');
        // dd($arc[0]);
        // dd(count($arc));

        $pdfdj = $r->file('pdfDj');
        $pdfcci = $r->file('pdfCci');
        $pdfanexo = $r->file('pdfAnexo5');

        // Crear una instancia de Fpdi
        $pdf = new Fpdi();

        // Combinar pdfdj
        $pdf->setSourceFile($pdfdj->path());
        for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfdj->path()); $pagina++) {
            $tplIdx = $pdf->importPage($pagina);
            $pdf->AddPage();
            $pdf->useTemplate($tplIdx);
        }

        // Combinar pdfcci
        $pdf->setSourceFile($pdfcci->path());
        for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfcci->path()); $pagina++) {
            $tplIdx = $pdf->importPage($pagina);
            $pdf->AddPage();
            $pdf->useTemplate($tplIdx);
        }

        // Combinar pdfanexo
        $pdf->setSourceFile($pdfanexo->path());
        for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfanexo->path()); $pagina++) {
            $tplIdx = $pdf->importPage($pagina);
            $pdf->AddPage();
            $pdf->useTemplate($tplIdx);
        }

        // Ruta para el PDF combinado
        $rutaPdfCombinado = storage_path('app/public/juntarPdfs/pdf_combinado.pdf');

        // Guardar el PDF combinado
        $pdf->Output($rutaPdfCombinado, 'F');

        return response()->json(['rutaPdfCombinado' => $rutaPdfCombinado]);
        // ---------------------------------------------
        // ---------------------------------------------
        // ---------------------------------------------
        // ---------------------------------------------
        // ---------------------------------------------
        // ---------------------------------------------
        $pdfPaths = [
            storage_path('app/public/juntarPdfs/pri.pdf'),
            storage_path('app/public/juntarPdfs/seg.pdf'),
            storage_path('app/public/juntarPdfs/ter.pdf'),
            // ... Añade más rutas según sea necesario
        ];

        // Ruta para guardar el PDF combinado
        $pdfCombinadoPath = storage_path('app/public/juntarPdfs/pdf_combinado.pdf');

        // Instancia FPDI
        $pdf = new Fpdi();
        
        // Combina los PDFs
        foreach ($pdfPaths as $pdfPath) {
            $pdf->addPage();
            $pdf->setSourceFile($pdfPath);
            $templateId = $pdf->importPage(1);
            $pdf->useTemplate($templateId);
        }

        // Guarda el PDF combinado
        $pdf->output('F', $pdfCombinadoPath);

        // Devuelve una respuesta o haz lo que necesites
        return response()->download($pdfCombinadoPath);

        // $archivos = $r->file('archivos');
        // foreach ($archivos as $archivo) {
        //     // $ruta = Storage::putFile('public/ofetas', $archivo);

        //     $nombreArchivo = uniqid() . '_' . time() . '.' . $archivo->getClientOriginalExtension();
        //     // Guarda el archivo en la ubicación deseada con el nuevo nombre
        //     $ruta = Storage::putFileAs('public/ofertas', $archivo, $nombreArchivo);
        // }
        // dd($r->all());
        // ----------------------------------------------------------------------------

    	// return response()->json(['estado' => true, 'message' => 'Se registro la postulacion correctamente----------']);
    	
        // $ttt = json_decode($r->items,true);

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
        // if(true)
    	$tCrp = TCotrecpro::create($r->all());
    	if($tCrp)
    	{
    		// $this->saveDetalleProCot($r,'3');
    		if($this->saveDetalleProCot($r,$tCrp->idCrp))
    		{
                // ---
                // ---
                // ---
                // dd(gettype($r->file('archivos')));
                if($r->file('archivos')!==null)
                {
                    for ($i=0; $i < count($r->file('archivos')) ; $i++) 
                    { 
                        $archivo = $r->file('archivos')[$i];
                        $nombreArchivo = $this->arrayNombresFiles[$i]. '.' . $archivo->getClientOriginalExtension();
                        $ruta = Storage::putFileAs('public/ofertas/'.$tPro->idPro.'/'.$tCrp->idCrp.'/', $archivo, $nombreArchivo);
                    }
                }
                // ---
                // ---
                // ---
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
    // public function actGenerarCot(Request $r)
    // {   
    //     dd($r->all());
    // }
    public function actGenerarCot(Request $r)
    {
        dd($r->all());
        $p = Session::get('proveedor');

        // $nombre = strtoupper($p->tipoPersona="PERSONA NATURAL"?
  //        $p->nombre.' '.$p->apellidoPaterno.' '.$p->apellidoMaterno:
  //        $p->nombreRep.' '.$p->apellidoPaternoRep.' '.$p->apellidoMaternoRep);
        $nombre = 'csacasc';
        $dni = '47655230';
        // $ruc = $p->numeroDocumento;

        $marco = 0;
        $smarco = 1;
        $ssmarco = 1;
        $blanco = '';
        $fondo = true;
        $tam = 3.5;
        $sl = 2;

        $pdf = new Fpdf('P','mm','a4');
        // $pdf->SetFont('Arial','',6);
        $pdf->AddPage();
        // --------------------cabecera
        // $pdf->Cell(0,$tam+35,utf8_decode('-'),$marco,1,'C');
        $pdf->Image('img/panelAdm/logoFile.png',10,10,18);
        $pdf->SetFont('Arial','B',9);
        $pdf->text(33,13.5,utf8_decode('GOBIERNO REGIONAL DE APURIMAC'));
        $pdf->Cell(190,5,utf8_decode('-'),$marco,1,'L');
        $pdf->SetFont('Arial','',6);
        $pdf->text(38,17,utf8_decode('OFICINA DE ABASTECIMIENTO Y SERVICIOS'));
        $pdf->text(54,20.5,utf8_decode('AUXILIARES'));
        $pdf->Cell(190,3,utf8_decode('---'),$marco,1,'C');
        $pdf->Cell(190,3,utf8_decode('---'),$marco,1,'C');

        $pdf->SetFont('Arial','',11);
        $pdf->Rect(180, 10, 20, 9, 'D');
        $pdf->Rect(160, 10, 20, 9, 'D');
        $pdf->text(183.5,14,utf8_decode('FECHA'));
        $pdf->text(166,14,utf8_decode('AÑO'));
        $pdf->SetFont('Arial','',10);
        $pdf->text(181,18,utf8_decode('03/03/6666'));
        $pdf->text(166,18,utf8_decode('6666'));
        $pdf->ln(12);
        // estas lineas borrar
        // $pdf->Cell(190,5,utf8_decode('_______________________________________________________________________________________________________________________________'),$marco,1,'C');
        // $pdf->Line(10, 20, 100, 20);
// ------titulo
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,6,utf8_decode('SOLICITUD DE COTIZACION Nª 609'),$marco,1,'C');
        $pdf->ln(9);
// ------primera seccion
    $pdf->SetFont('Arial','',9);
        $pdf->Rect(10, 46, 190, 35, 'D');
        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('RAZON SOCIAL:'),$marco,0,'L');
        $pdf->Cell(70,$tam+2,utf8_decode('________________________________________'),$marco,0,'L');
        $pdf->Cell(25,$tam+2,utf8_decode('RUC:'),$marco,0,'L');
        $pdf->Cell(59,$tam+2,utf8_decode('________________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,1,'L');

        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('DIRECCION:'),$marco,0,'L');
        $pdf->Cell(48,$tam+2,utf8_decode('____________________________'),$marco,0,'L');
        $pdf->Cell(22,$tam+2,utf8_decode('TELEFONO:'),$marco,0,'L');
        $pdf->Cell(25,$tam+2,utf8_decode('_______________'),$marco,0,'L');
        $pdf->Cell(14,$tam+2,utf8_decode('EMAIL:'),$marco,0,'L');
        $pdf->Cell(45,$tam+2,utf8_decode('________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,1,'L');

        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('REFERENCIA:'),$marco,0,'L');
        $pdf->Cell(154,$tam+2,utf8_decode('______________________________________________________________________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,1,'L');

        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('Nª META:'),$marco,0,'L');
        $pdf->Cell(154,$tam+2,utf8_decode('______________________________________________________________________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,1,'L');

        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,0,'L');
        $pdf->MultiCell(184,$tam+2, utf8_decode('Por medio de la presente sirvase cotizar los siguientes items correspondientes al cuadro de contrataciones Nro. 844 de fecha'), $marco, 'J');

        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,0,'L');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18,$tam+2,utf8_decode('03/03/6666'),$marco,1,'L');
        $pdf->ln(3);


// items
        $pdf->Rect(10, 84, 10, 129.6, 'D');
        $pdf->Rect(20, 84, 15, 129.6, 'D');
        $pdf->Rect(35, 84, 15, 129.6, 'D');
        $pdf->Rect(50, 84, 75, 129.6, 'D');
        $pdf->Rect(125, 84, 15, 129.6, 'D');
        $pdf->Rect(140, 84, 20, 129.6, 'D');
        $pdf->Rect(160, 84, 20, 129.6, 'D');
        $pdf->Rect(180, 84, 20, 129.6, 'D');

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(10,$tam+6,utf8_decode('ITEM'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('CANT'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('UMD'),$ssmarco,0,'C');
        $pdf->Cell(75,$tam+6,utf8_decode('DESCRIPCION'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('MARCA'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('MODELO'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('P.V'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('SUBTOTAL'),$ssmarco,1,'C');
        // -----
        $pdf->SetFont('Arial','',8);
        $parrafo = 'Este es un texto largo que ocupa varias líneas. ';
        $parrafo2 = 'Este es un texto largo que ocupa vars líneas rs líneas c';
        $lispar = [
            '1.-Este es un texto largo que ocupa vars líneas rs líneas c',
            '2.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
            '3.-Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
            '4.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
            '5.-Este es un texto largo que ocupa vars líneas rs líneas c',
            '6.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
            '7.-Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
            '8.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
            '9.- es un texto largo que ocupa vars líneas rs líneas c',
            '10.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
            '11.-Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
            '12.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
            '13.-Este es un texto largo que ocupa vars líneas rs líneas c',
            '14.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
            '15.-kevins Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
            '16.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
            '17.-Este es un texto largo que ocupa vars líneas rs líneas c',
            '18.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
            '19.-kevins Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
            '20.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
            '21.-Este es un texto largo que ocupa vars líneas rs líneas c',
            '22.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
            '23.-Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
            '24.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
            '25.-Este es un texto largo que ocupa vars líneas rs líneas c',
            '26.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
            '27.-Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
            '28.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
            '29.- es un texto largo que ocupa vars líneas rs líneas c',
            '30.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
            '31.-Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
            '22.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
            '33.-Este es un texto largo que ocupa vars líneas rs líneas c',
            '34.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
            '35.-kevins Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
            '36.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
            '37.-Este es un texto largo que ocupa vars líneas rs líneas c',
            '38.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
            '39.-kevins Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
            '40.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c'];
        $alcance = 0;
        // $pdf->text(95,45,count($lispar));
        for ($i=0; $i < count($lispar); $i++) 
        { 
            $tam = 4;
            $tam2 = 4;
            if(strlen($lispar[$i])>60)
            {
                $mul = intval(strlen($lispar[$i]) / 60)+1;
            }
            else
            {
                $mul = 1;
            }
            $alcance = $alcance + $mul;
            if($alcance>30)
            {
                $lispar2 = array_slice($lispar, $i);
                $pdf->text(150,42,'nuevo array tiene->'.count($lispar2));

                $pdf->text(120,42,'mul->'.$mul);
                $pdf->text(120,44,'alcance->'.$alcance);
                $pdf->text(120,46,'cant lista->'.count($lispar));
                $pdf->AddPage();
                // enviar a una funcion
                $this->cot($pdf,$lispar2);
                break;

            }
            $tam = $tam*$mul;

            $xPosition = $pdf->GetX();
            $yPosition = $pdf->GetY();

            $pdf->Cell(10,$tam,utf8_decode($i),$ssmarco,0,'C');
            $pdf->Cell(15,$tam,utf8_decode('1.00'),$ssmarco,0,'C');
            $pdf->Cell(15,$tam,utf8_decode('servicio'),$ssmarco,0,'C');
            // $pdf->Cell(75,$tam,utf8_decode('adquisicion de productos'),$ssmarco,0,'L');
            // $pdf->MultiCell(75, $tam, utf8_decode($parrafo2.strlen($parrafo2)),$ssmarco);
            $pdf->MultiCell(75, $tam2, utf8_decode($lispar[$i].strlen($lispar[$i])),$ssmarco);
            $pdf->SetY($yPosition);
            $pdf->SetX($xPosition+115);
            $pdf->Cell(15,$tam,utf8_decode('marca'),$ssmarco,0,'C');
            $pdf->Cell(20,$tam,utf8_decode('modelo'),$ssmarco,0,'C');
            $pdf->Cell(20,$tam,utf8_decode('100.00'),$ssmarco,0,'C');
            $pdf->Cell(20,$tam,utf8_decode('100.00'),$ssmarco,1,'C');

            // unset($lispar[$i]);
        }

        $pdf->text(95,250,$alcance.'---');
        // $tam = 3.5;
        // $pdf->ln(105.6);
        // $pdf->SetFont('Arial','',9);
        // $pdf->Cell(150,$tam+3,utf8_decode('-'),0,0,'C');
        // $pdf->Cell(20,$tam+3,utf8_decode('Total'),$ssmarco,0,'C');
        // $pdf->Cell(20,$tam+3,utf8_decode('S/. 256'),$ssmarco,1,'C');


        $pdf->Output();

        exit;
    }
    function cot($pdf,$lispar)
    {
        $p = Session::get('proveedor');

        // $nombre = strtoupper($p->tipoPersona="PERSONA NATURAL"?
        // $p->nombre.' '.$p->apellidoPaterno.' '.$p->apellidoMaterno:
        // $p->nombreRep.' '.$p->apellidoPaternoRep.' '.$p->apellidoMaternoRep);
        $nombre = 'csacasc';
        $dni = '47655230';
        // $ruc = $p->numeroDocumento;

        $marco = 0;
        $smarco = 1;
        $ssmarco = 1;
        $blanco = '';
        $fondo = true;
        $tam = 3.5;
        $sl = 2;

// cabecera
        $pdf->Image('img/panelAdm/logoFile.png',10,10,18);
        $pdf->SetFont('Arial','B',9);
        $pdf->text(33,13.5,utf8_decode('GOBIERNO REGIONAL DE APURIMAC'));
        $pdf->Cell(190,5,utf8_decode('-'),$marco,1,'L');
        $pdf->SetFont('Arial','',6);
        $pdf->text(38,17,utf8_decode('OFICINA DE ABASTECIMIENTO Y SERVICIOS'));
        $pdf->text(54,20.5,utf8_decode('AUXILIARES'));
        $pdf->Cell(190,3,utf8_decode('---'),$marco,1,'C');
        $pdf->Cell(190,3,utf8_decode('---'),$marco,1,'C');

        $pdf->SetFont('Arial','',11);
        $pdf->Rect(180, 10, 20, 9, 'D');
        $pdf->Rect(160, 10, 20, 9, 'D');
        $pdf->text(183.5,14,utf8_decode('FECHA'));
        $pdf->text(166,14,utf8_decode('AÑO'));
        $pdf->SetFont('Arial','',10);
        $pdf->text(181,18,utf8_decode('03/03/6666'));
        $pdf->text(166,18,utf8_decode('6666'));
        $pdf->ln(12);
// fin de cabecera
        
// titulo
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,6,utf8_decode('SOLICITUD DE COTIZACION Nª 609'),$marco,1,'C');
        $pdf->ln(9);
// fin de titulo

// primera seccion
        $pdf->SetFont('Arial','',9);
        // $pdf->Rect(10, 47, 190, 23, 'D');
        $pdf->Rect(10, 46, 190, 35, 'D');
        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('RAZON SOCIAL:'),$marco,0,'L');
        $pdf->Cell(70,$tam+2,utf8_decode('________________________________________'),$marco,0,'L');
        $pdf->Cell(25,$tam+2,utf8_decode('RUC:'),$marco,0,'L');
        $pdf->Cell(59,$tam+2,utf8_decode('________________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,1,'L');

        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('DIRECCION:'),$marco,0,'L');
        $pdf->Cell(48,$tam+2,utf8_decode('____________________________'),$marco,0,'L');
        $pdf->Cell(22,$tam+2,utf8_decode('TELEFONO:'),$marco,0,'L');
        $pdf->Cell(25,$tam+2,utf8_decode('_______________'),$marco,0,'L');
        $pdf->Cell(14,$tam+2,utf8_decode('EMAIL:'),$marco,0,'L');
        $pdf->Cell(45,$tam+2,utf8_decode('________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,1,'L');

        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('REFERENCIA:'),$marco,0,'L');
        $pdf->Cell(154,$tam+2,utf8_decode('______________________________________________________________________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,1,'L');

        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('Nª META:'),$marco,0,'L');
        $pdf->Cell(154,$tam+2,utf8_decode('______________________________________________________________________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,1,'L');

        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,0,'L');
        $pdf->MultiCell(184,$tam+2, utf8_decode('Por medio de la presente sirvase cotizar los siguientes items correspondientes al cuadro de contrataciones Nro. 844 de fecha'), $marco, 'J');

        $pdf->Cell(3,$tam+2,utf8_decode('-'),$marco,0,'L');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18,$tam+2,utf8_decode('03/03/6666'),$marco,1,'L');
        $pdf->ln(3);
// fin de primera seccion

// ---------------------------------------------------------------items
// esquema
        $pdf->Rect(10, 84, 10, 129.6, 'D');
        $pdf->Rect(20, 84, 15, 129.6, 'D');
        $pdf->Rect(35, 84, 15, 129.6, 'D');
        $pdf->Rect(50, 84, 75, 129.6, 'D');
        $pdf->Rect(125, 84, 15, 129.6, 'D');
        $pdf->Rect(140, 84, 20, 129.6, 'D');
        $pdf->Rect(160, 84, 20, 129.6, 'D');
        $pdf->Rect(180, 84, 20, 129.6, 'D');
// fin de esquema

// cabezera de tabla
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(10,$tam+6,utf8_decode('ITEM'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('CANT'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('UMD'),$ssmarco,0,'C');
        $pdf->Cell(75,$tam+6,utf8_decode('DESCRIPCION'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('MARCA'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('MODELO'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('P.V'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('SUBTOTAL'),$ssmarco,1,'C');
// fin de cabera de tabla

// lista
        $pdf->SetFont('Arial','',8);
        $alcance = 0;
        for ($i=0; $i < count($lispar); $i++) 
        { 
            $tam = 4;
            $tam2 = 4;
            if(strlen($lispar[$i])>60)
            {
                $mul = intval(strlen($lispar[$i]) / 60)+1;
            }
            else
            {
                $mul = 1;
            }
            $alcance = $alcance + $mul;
            if($alcance>30)
            {
                $lispar2 = array_slice($lispar, $i);
                $pdf->text(150,42,'nuevo array tiene->'.count($lispar2));

                $pdf->text(120,42,'mul->'.$mul);
                $pdf->text(120,44,'alcance->'.$alcance);
                $pdf->text(120,46,'cant lista->'.count($lispar));
                $pdf->AddPage();
                // enviar a una funcion
                $this->cot($pdf,$lispar2);
                break;

            }
            $tam = $tam*$mul;

            $xPosition = $pdf->GetX();
            $yPosition = $pdf->GetY();

            $pdf->Cell(10,$tam,utf8_decode($i),$ssmarco,0,'C');
            $pdf->Cell(15,$tam,utf8_decode('1.00'),$ssmarco,0,'C');
            $pdf->Cell(15,$tam,utf8_decode('servicio'),$ssmarco,0,'C');
            // $pdf->Cell(75,$tam,utf8_decode('adquisicion de productos'),$ssmarco,0,'L');
            // $pdf->MultiCell(75, $tam, utf8_decode($parrafo2.strlen($parrafo2)),$ssmarco);
            $pdf->MultiCell(75, $tam2, utf8_decode($lispar[$i].strlen($lispar[$i])),$ssmarco);
            $pdf->SetY($yPosition);
            $pdf->SetX($xPosition+115);
            $pdf->Cell(15,$tam,utf8_decode('marca'),$ssmarco,0,'C');
            $pdf->Cell(20,$tam,utf8_decode('modelo'),$ssmarco,0,'C');
            $pdf->Cell(20,$tam,utf8_decode('100.00'),$ssmarco,0,'C');
            $pdf->Cell(20,$tam,utf8_decode('100.00'),$ssmarco,1,'C');
        }
// fin de lista
        $pdf->text(95,230,$alcance.'----------------------------------terminado------------------------------');
        $tam = 3.5;
        $pdf->ln(40);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(150,$tam+3,utf8_decode('-'),0,0,'C');
        $pdf->Cell(20,$tam+3,utf8_decode('Total'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+3,utf8_decode('S/. 256'),$ssmarco,1,'C');
        $pdf->ln(3);

        $marco = 0;
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(3,$tam,'',$marco,0,'C');
        $pdf->Cell(187,$tam,utf8_decode('La cotizaciones deben estar dirigidas a GOBIERNO REGIONAL DE APURIMAC - SEDE CENTRAL'),$marco,1,'L');
        $pdf->Cell(3,$tam,'',$marco,0,'L');
        $pdf->Cell(187,$tam,utf8_decode('en la siguiente direccion: JR. PUNO Nª 107 Telefono: 083-321022'),$marco,1,'L');

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(3,$tam,'',$marco,0,'L');
        $pdf->Cell(187,$tam,utf8_decode('Condicion de compra'),$marco,1,'L');
        $pdf->Cell(3,$tam,utf8_decode(''),$marco,0,'L');
        $pdf->Cell(187,$tam,utf8_decode('- Forma de Pago:'),$marco,1,'L');
        $pdf->Cell(3,$tam,'',$marco,0,'L');
        $pdf->Cell(187,$tam,utf8_decode('- Garantia:'),$marco,1,'L');
        $pdf->Cell(3,$tam,'',$marco,0,'L');
        $pdf->Cell(187,$tam,utf8_decode('- La Cotizacion debe incluir el I.G.V.:'),$marco,1,'L');
        $pdf->Cell(3,$tam,'',$marco,0,'L');
        $pdf->Cell(187,$tam,utf8_decode('- Plazo de entrega / Ejecucion de Servicio:'),$marco,1,'L');
        $pdf->Cell(3,$tam,'',$marco,0,'L');
        $pdf->Cell(187,$tam,utf8_decode('- Tipo de Moneda:'),$marco,1,'L');
        $pdf->Cell(3,$tam,'',$marco,0,'L');
        $pdf->Cell(187,$tam,utf8_decode('- Validez de la cotizacion:'),$marco,1,'L');
        $pdf->Cell(3,$tam,'',$marco,0,'L');
        $pdf->Cell(187,$tam,utf8_decode('- Remitir junto con su cotizacion la Declaracion Jurada y Pacto de Integridad, debidamente firmadas y selladas.'),$marco,1,'L');
        $pdf->Cell(3,$tam,'',$marco,0,'L');
        $pdf->Cell(187,$tam,utf8_decode('- Indicar su razon social, domicilio fiscal y numero de RUC:'),$marco,1,'L');

        $pdf->text(84,275,utf8_decode('____________________________'));
        $pdf->text(93,278.3,utf8_decode('Area de Loguistica'));

        $pdf->Output();
        exit;
    }
}
