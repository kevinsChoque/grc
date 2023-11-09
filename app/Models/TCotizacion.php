<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCotizacion extends Model
{
    protected $table='cotizacion';
	protected $primaryKey='idCot';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idCot', 
        'numeroCotizacion', 
        'tipo', 
        'unidadEjecutora',
        'documento',
        'fechaCotizacion',
        'fechaFinalizacion',
        'concepto',
        'descripcion',
        'archivo',
        'estadoCotizacion',
        'estado',
        'fr',
        'fa'
    ];
}
