@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Cotizaciones</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
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
        <div class="col-md-12 mb-3">
            <button class="btn btn-sm btn-success float-right btnPmsRegistrar" data-toggle="modal" data-target="#modalRegistrar">
                <i class="fa fa-list"></i> Cotizaciones
            </button>
        </div>
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay overlayRegistros">
                    <div class="spinner"></div>
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-car"></i> Registrar Cotizacion</h3>
                </div>
                <div class="card-body p-0">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">1.-Datos de la cotizacion</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">2.-Descripcion</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">3.-Archivo de Cotizacion</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-two-tabContent">
                                        <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label class="m-0">Numero de Cotizacion: <span class="text-danger">*</span> <i class="fa fa-info-circle text-info"></i></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="numeroCotizacion" name="numeroCotizacion">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group col-lg-6">
                                                    <label class="m-0">Tipo de Cotizacion: <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="tipo" name="tipo">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="m-0">Unidad Ejecutora: <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="unidadEjecutora" name="unidadEjecutora">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="m-0">Numero de Identificacion: <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="numeroIdentificacion" name="numeroIdentificacion">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="m-0">Documento: <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="documento" name="documento">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="m-0">Nro. Cons.: <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="nroCons" name="nroCons">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="m-0">Fecha de la Cotizacion: <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="fechaCotizacion" name="fechaCotizacion">
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                            <h4>Concepto:</h4>
                                            <div id="concepto">Hello Summernote</div>
                                            <h4>Descripcion / Observacion:</h4>
                                            <div id="descripcion">Hello Summernote</div>
                                            <!-- <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label class="m-0">Concepto: <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="concepto" name="concepto">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="m-0">Descripcion: <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form method="post" enctype="multipart/form-data" class="dropzone dz-clickable h-100 text-center" id="dropzoneSubirArchivos">
                                                        <input type="hidden" id="id" name="id" class="id">
                                                        <div>
                                                            <h6 class="text-center font-weight-bold">SUBIR ARCHIVO</h6>
                                                        </div>
                                                        <div class="dz-default dz-message">
                                                            <span class="font-weight-bold font-italic">Suelta el archivo o realiza click para cargar archivo</span>
                                                        </div>
                                                        @csrf       
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
          <!-- --------- -->
                        
                    </div>
                </div>
                <div class="card-footer py-1 border-transparent">
                    <button type="button" class="btn btn-success float-right guardar ml-2 guardarArchivo"><i class="fa fa-save"></i> Guardar</button>
                    <button type="button" class="btn btn-light float-right" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// localStorage.setItem("sbd",1);
// localStorage.setItem("sba",4);
    // var tablaDeRegistros;
    // var flip=0;
    Dropzone.options.myDropzone = false;
Dropzone.autoDiscover = false;
var myDropzone='';
    $(document).ready( function () {
        // tablaDeRegistros=$('.contenedorRegistros').html();
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
        $('#concepto').summernote({
            height: 150,
        });
        $('#descripcion').summernote({
            height: 150,
        });
        vdsvsd();

        // var html = $('#summernote').summernote('code');
        // $('#descripcion').summernote();
    } );

    function vdsvsd()
{
    console.log('una vez');
    myDropzone = new Dropzone("#dropzoneSubirArchivos", 
    {
        url: "plantilla/subirArchivos",
        dictDefaultMessage: "Seleccione algun archivo.",
        paramName: "file",
        autoProcessQueue:false,
        maxFiles: 1,
        addRemoveLinks: true,
        // maxFilesize: 0.5,
        clickable: true,
        // renameFile: function(file) {
        //     return new Date().getTime() + "_" + file.name;
        // },
        init:function()
        {
            var submitButton = document.querySelector('.guardarArchivo');
            myDropzone=this;
            submitButton.addEventListener('click',function(){
                flatPlantilla=true;
                myDropzone.processQueue();
            });
            this.on("addedfile", function (file) {
            });
            this.on("removedfile", function (file) {
                console.log('se esta removiendo algo');
            });
            this.on("maxfilesexceeded", function(file){
                // alert("Solo se puede subir 1 plantilla!");
                msjFiles(false,'Solo se puede subir 1 plantilla!');
                flatPlantilla=false;
                console.log('maxfilesexceeded-'+flatPlantilla);
            });
            this.on('complete',function(result){
                console.log('complete-'+flatPlantilla);
                myDropzone.removeAllFiles();
                if(flatPlantilla)
                {
                    msjFiles(true,'Se guardo la plantilla');
                    fillCamposPlantilla();
                }
            })
        },
    });
}
    
    // -----------------------------------------------------------------------------------------------DropzoneJS Demo Code Start
  
  // -----------------------------------------------------------------------------------------------DropzoneJS Demo Code End
    
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