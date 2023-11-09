@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Usuarios</h1></div>
            <div class="col-sm-6">
                <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#modalRegistrar">
	                <i class="fa fa-plus"></i> 
	                Nuevo Usuario
	            </button>
                <ol class="breadcrumb float-sm-right" style="display: none;">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v3</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay overlayRegistros">
                    <div class="spinner"></div>
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa-solid fa-car-tunnel"></i> Lista de Usuarios</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 contenedorRegistros table-responsive" style="display: none;">
                            <table id="registros" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" data-priority="1">Numero</th>
                                        <th class="text-center" data-priority="2">Concepto</th>
                                        <th class="text-center" data-priority="3">Tipo</th>
                                        <th class="text-center" data-priority="4">F.Finalizacion</th>
                                        <th class="text-center" data-priority="4">Estado</th>
                                        <th class="text-center" data-priority="1">Opc.</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th class="text-center" data-priority="1">Numero</th>
                                        <th class="text-center" data-priority="2">Concepto</th>
                                        <th class="text-center" data-priority="3">Tipo</th>
                                        <th class="text-center" data-priority="4">F.Finalizacion</th>
                                        <th class="text-center" data-priority="4">Estado</th>
                                        <th class="text-center" data-priority="1">Opc.</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('usuario.modals')
<script>
// localStorage.setItem("sbd",1);
// localStorage.setItem("sba",4);
    var tablaDeRegistros;
    var flip=0;

    $(document).ready( function () {
        tablaDeRegistros=$('.contenedorRegistros').html();
        fillRegistros();
        $('.overlayPagina').css("display","none");
    } );
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{ url('cotizacion/listar') }}",
            method: 'get',
            success: function(r)
            {
                console.log(r.data);
                var html = '';
                let opciones = '';
                for (var i = 0; i < r.data.length; i++) 
                {
                    if(r.data[i].estadoCotizacion=='1')
                    {
                        opciones = '<button type="button" class="btn text-info" title="Editar registro" onclick="editar('+r.data[i].idCot+');"><i class="fa fa-edit" ></i></button>'+
                            '<button type="button" class="btn text-danger" title="Eliminar registro" onclick="eliminar('+r.data[i].idCot+');"><i class="fa fa-trash"></i></button>';
                    }
                    
                    html += '<tr>' +
                        '<td class="text-center font-weight-bold">' + r.data[i].numeroCotizacion + '</td>' +
                        '<td class="text-left"><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].concepto) + '</p></td>' +
                        '<td class="text-center">' + badgeTipoCot(r.data[i].tipo) +'</td>' +
                        '<td class="text-center">' + novDato(r.data[i].fechaFinalizacion) + '</td>' +
                        '<td class="text-center">' + estadoCotizacion(r.data[i].estadoCotizacion) + '<button class="btn text-info" onclick="changeEstadoCot('+r.data[i].idCot+','+r.data[i].numeroCotizacion+')"><i class="fa fa-edit"></i></button></td>' +
                        '<td class="text-center">' + 
                            '<div class="btn-group btn-group-sm" role="group">'+
                                opciones+
                            '</div>'+
                        '</td></tr>';
                    opciones='';
                }
                $('#data').html(html);
                initDatatable('registros');
                $('.overlayRegistros').css('display','none');
            }
        });
        
    }
    function eliminar(id)
    {
        Swal.fire({
            title: 'Esta seguro de eliminar el registro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if(result.isConfirmed)
            {
                $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
                jQuery.ajax(
                { 
                    url: "{{url('cotizacion/eliminar')}}",
                    data: {id:id},
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(result){
                        construirTabla();
                        fillRegistros();
                        msjRee(result);
                    }
                });
            }
        });
    }
    
    function construirTabla()
    {
        $('.contenedorRegistros>div').remove();
        $('.contenedorRegistros').html(tablaDeRegistros);
    }
</script>

@endsection