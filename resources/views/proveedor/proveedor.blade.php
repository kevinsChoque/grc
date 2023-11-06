@extends('layout.layout')
@section('nombreContenido', '----')
@section('headboard')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">Proveedores</h6>
        </div>
        <div class="col-sm-6" style="visibility: hidden;">
            <ol class="breadcrumb float-sm-right mr-3 p-0 mb-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
        </div>
        <!-- <div class="col-lg-6 col-sm-6 col-12">
            <button class="btn btn-sm btn-success float-right btnPmsRegistrar" data-toggle="modal" data-target="#modalRegistrar">
                <i class="fa fa-plus"></i> 
                Nuevo registro
            </button>
        </div> -->
    </div>
</div>
<style>
    .spinner {
  border: 4px solid rgba(0, 0, 0, 0.1);
  border-top: 4px solid #3498db;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 my-3">
            <button class="btn btn-sm btn-success float-right btnPmsRegistrar" data-toggle="modal" data-target="#modalRegistrar">
                <i class="fa fa-plus"></i> Nuevo registro
            </button>
        </div>
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay overlayRegistros">
                    <!-- <img src="{{asset('img/imgAdicionales/spinerLetter2.svg')}}" class="svgLoadLetter"> -->
                    <!-- <i class="fas fa-2x fa-spinner"></i> -->
                    <div class="spinner"></div>
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa-solid fa-car-tunnel"></i> Listado de Proveedores</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 contenedorRegistros" style="display: none;">
                            <table id="registros" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" data-priority="1">Nombre</th>
                                        <th class="text-center" data-priority="3">Observacion</th>
                                        <th class="text-center" data-priority="2">Estado</th>
                                        <th class="text-center" data-priority="4">F.Reg.</th>
                                        <th class="text-center" data-priority="4">F.Act.</th>
                                        <th class="text-center" data-priority="1">Opc.</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th class="text-center" data-priority="1">Nombre</th>
                                        <th class="text-center" data-priority="3">Observacion</th>
                                        <th class="text-center" data-priority="2">Estado</th>
                                        <th class="text-center" data-priority="4">F.Reg.</th>
                                        <th class="text-center" data-priority="4">F.Act.</th>
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

@include('proveedor.modals')
<script>
// localStorage.setItem("sbd",1);
// localStorage.setItem("sba",4);
    // var tablaDeRegistros;
    // var flip=0;

    $(document).ready( function () {
        // tablaDeRegistros=$('.contenedorRegistros').html();
        $('.overlayPagina').css("display","none");
    } );
    
    // function fillRegistros()
    // {
    //     if(pmsFlat.l)
    //     {
    //         $('.contenedorRegistros').css('display','block');
    //         jQuery.ajax(
    //         { 
    //             url: __API__+"ruta/listar",
    //             method: 'post',
    //             success: function(result){
    //                 var html = '';
    //                 for (var i = 0; i < result.data.length; i++) 
    //                 {
    //                     edit = pmsFlat.a?'<button type="button" class="btn text-info" title="Editar registro" onclick="editar('+result.data[i].idRuta+');"><i class="fa fa-edit" ></i></button>':'-';
    //                     dele = pmsFlat.e?'<button type="button" class="btn text-danger" title="Eliminar registro" onclick="eliminar('+result.data[i].idRuta+');"><i class="fa fa-trash"></i></button>':'-';
    //                     html += '<tr>' +
    //                         '<td class="text-center">' + result.data[i].nombre + '</td>' +
    //                         '<td class="text-center">' + novDato(result.data[i].observacion) +'</td>' +
    //                         '<td class="text-center">' + formatoEstado(result.data[i].estado) + '</td>' +
    //                         '<td class="text-center">' + formatoDateHours(result.data[i].fechaRegistro) + '</td>' +
    //                         '<td class="text-center">' + verificarFecha(novDato(result.data[i].fechaActualizacion)) + '</td>' +
    //                         '<td class="text-center"><div class="btn-group btn-group-sm" role="group">'+
    //                         edit+
    //                         dele+
    //                         '</div></td></tr>';
    //                 }
    //                 $('#data').html(html);
    //                 initDatatable('registros');
    //                 $('.overlayRegistros').css('display','none');
    //             }
    //         });
    //     }
    //     else
    //     {
    //         notPmsList();
    //     }
    // }
    // function eliminar(id)
    // {
    //     Swal.fire({
    //         title: 'Esta seguro de eliminar el registro?',
    //         text: "¡No podrás revertir esto!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#28a745',
    //         cancelButtonColor: '#6c757d',
    //         confirmButtonText: 'Si, eliminar!'
    //     }).then((result) => {
    //         if(result.isConfirmed)
    //         {
    //             $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
    //             jQuery.ajax(
    //             { 
    //                 url: __API__+'ruta/eliminar',
    //                 data: {id:id},
    //                 method: 'post',
    //                 success: function(result){
    //                     construirTabla();
    //                     fillRegistros();
    //                     msjRee(result);
    //                 }
    //             });
    //         }
    //     });
    // }
    // function construirTabla()
    // {
    //     $('.contenedorRegistros>div').remove();
    //     $('.contenedorRegistros').html(tablaDeRegistros);
    // }
    // function limpiarForm()
    // {
    //     $('.contenedorFormularioRegistrar :input').val('');
    // }
</script>
@endsection