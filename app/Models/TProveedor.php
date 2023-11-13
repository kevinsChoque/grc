<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TProveedor extends Model
{
    protected $table='proveedor';
	protected $primaryKey='idPro';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idPro', 
        'tipoPersona',
        'numeroDocumento', 
        'razonSocial', 
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'direccion',
        'activo',
        'habido',
        'dniRep',
        'nombreRep',
        'apellidoPaternoRep',
        'apellidoMaternoRep',
        'direccionRep',
        'correo',
        'celular',
        'obs',
        'estadoProveedor',
        'estado',
        'fr',
        'fa',
    ];
}
