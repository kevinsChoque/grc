@extends('plantilla.plantilla')
@section('pageTitle')
<div class="content-header pb-0 pt-2" style="display: none;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Mis Cotizaciones</h1></div>
            <div class="col-sm-6">
                <!-- <a href="{{url('cotizacion/ver')}}" class="btn btn-success float-right"><i class="fa fa-list"></i> Cotizaciones</a> -->
                <ol class="breadcrumb float-sm-right" style="display: none;">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v3</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('contentPanelAdmin')

<div class="container-fluid mt-3">
    <div class="card">
        <div class="overlay overlayRegistros">
            <div class="spinner"></div>
        </div>
    	<div class="card-body">
    		<h3 class="text-center font-weight-bold font-italic">MIS DATOS</h3>
    		<form id="fvproveedor">
    		<div class="row">
                <div class="form-group col-lg-4">
                    <label class="m-0">Tipo de persona: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <select name="tipoPersona" id="tipoPersona" class="form-control tipoPersona">
                            <option disabled value="0"> Seleccione una opcion</option>
                            <option value="PERSONA NATURAL">PERSONA NATURAL</option>
                            <option value="PERSONA JURIDICA" selected>PERSONA JURIDICA</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Numero de documento: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control input numeroDocumento soloNumeros" id="numeroDocumento" name="numeroDocumento" maxlength="11">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Razon social: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control pj razonSocial input" id="razonSocial" name="razonSocial">
                    </div>
                </div>
                <div class="form-group col-lg-4" style="display: none;">
                    <label class="m-0">Nombre: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control pn nombre input" id="nombre" name="nombre">
                    </div>
                </div>
                <div class="form-group col-lg-4" style="display: none;">
                    <label class="m-0">Apellido paterno: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control pn apellidoPaterno input" id="apellidoPaterno" name="apellidoPaterno">
                    </div>
                </div>
                <div class="form-group col-lg-4" style="display: none;">
                    <label class="m-0">Apellido materno: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control pn apellidoMaterno input" id="apellidoMaterno" name="apellidoMaterno">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Direccion: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control input" id="direccion" name="direccion">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Activo (SUNAT): <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <select name="activo" id="activo" class="form-control activo">
                            <option disabled value="0">Seleccione opcion</option>
                            <option value="1" selected>Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Habido (SUNAT): <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <select name="habido" id="habido" class="form-control habido">
                            <option disabled value="0">Seleccione opcion</option>
                            <option value="1" selected>Habido</option>
                            <option value="0">No habido</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">DNI del representante: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control pj soloNumeros input" id="dniRep" name="dniRep" maxlength="8">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Nombre del representante: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control pj input" id="nombreRep" name="nombreRep">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Apellido paterno del representante: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control pj input" id="apellidoPaternoRep" name="apellidoPaternoRep">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Apellido materno del representante: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control pj input" id="apellidoMaternoRep" name="apellidoMaternoRep">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Direccion del representante: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control pj input" id="direccionRep" name="direccionRep">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Correo: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control input" id="correo" name="correo">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Celular: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control soloNumeros input" id="celular" name="celular" maxlength="9">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Usuario: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control input" id="usuario" name="usuario">
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label class="m-0">Contraseña: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" class="form-control input" id="password" name="password">
                    </div>
                </div>
    		</div>
            </form>
    	</div>
        <div class="card-footer py-1 border-transparent">
            <!-- <button type="button" class="btn btn-light clean"><i class="fa fa-eraser"></i> Limpiar campos de busqueda</button> -->
            <button type="button" class="btn btn-success float-right save"><i class="fa fa-save"></i> Guardar datos</button>
        </div>
    </div>
</div>
<script>
    localStorage.setItem("sba",3);
    
    var flip=0;
    $(document).ready( function () {
        $.validator.addMethod("lettersOnly", function(value, element) {
            return this.optional(element) || /^[A-Za-z]+$/.test(value);
        }, "Este campo debe contener solo letras.");
        fillProveedor();
        initFv('fvproveedor',rules());
        $('.overlayPagina').css("display","none");
        // $('.overlayRegistros').css("display","none");
    });
    $('.tipoPersona').on('change',function(){
        changeTipoPersona($(this).val());
    });
    $('.save').on('click',function(){
        save();
    });
    function fillProveedor()
    {
        // {{Session::get('proveedor')->idPro}}
        jQuery.ajax(
        { 
            url: "{{ url('proveedor/editar') }}",
            data: {id:{{Session::get('proveedor')->idPro}}},
            method: 'post',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r){
                console.log(r);
                cleanFv('fvproveedor');
                idPro = r.data.idPro;
                $('#fvproveedor #tipoPersona').val(r.data.tipoPersona===null?'0':r.data.tipoPersona);
                $('#fvproveedor #numeroDocumento').val(r.data.numeroDocumento);
                $('#fvproveedor #direccion').val(r.data.direccion);
                $('#fvproveedor #activo').val(r.data.activo===null?'0':r.data.activo);
                $('#fvproveedor #habido').val(r.data.habido===null?'0':r.data.habido);
                $('#fvproveedor #correo').val(r.data.correo);
                $('#fvproveedor #celular').val(r.data.celular);
                $('#fvproveedor #usuario').val(r.data.usuario);
                if(r.data.tipoPersona=='PERSONA JURIDICA')
                {
                    $('#fvproveedor .razonSocial').rules('add', {required: true});
                    $('#fvproveedor .nombre').rules('remove', 'required');
                    $('#fvproveedor .apellidoPaterno').rules('remove', 'required');
                    $('#fvproveedor .apellidoMaterno').rules('remove', 'required');
                    $('#fvproveedor .pn').val('');
                    // --
                    $('#fvproveedor .razonSocial').val(r.data.razonSocial);
                    $('#fvproveedor #dniRep').val(r.data.dniRep);
                    $('#fvproveedor #nombreRep').val(r.data.nombreRep);
                    $('#fvproveedor #apellidoPaternoRep').val(r.data.apellidoPaternoRep);
                    $('#fvproveedor #apellidoMaternoRep').val(r.data.apellidoMaternoRep);
                    $('#fvproveedor #direccionRep').val(r.data.direccionRep);
                    $('#fvproveedor .pj').parent().parent().css('display','block');
                    $('#fvproveedor .pn').parent().parent().css('display','none');
                }
                else
                {
                    $('#fvproveedor .nombre').rules('add', {required: true});
                    $('#fvproveedor .apellidoPaterno').rules('add', {required: true});
                    $('#fvproveedor .apellidoMaterno').rules('add', {required: true});
                    $('#fvproveedor .razonSocial').rules('remove', 'required');
                    $('#fvproveedor .pj').val('');
                    // --
                    $('#fvproveedor .nombre').val(r.data.nombre);
                    $('#fvproveedor .apellidoPaterno').val(r.data.apellidoPaterno);
                    $('#fvproveedor .apellidoMaterno').val(r.data.apellidoMaterno);
                    $('#fvproveedor .pj').parent().parent().css('display','none');
                    $('#fvproveedor .pn').parent().parent().css('display','block');
                }
                $('.overlayRegistros').css("display","none");
            }
        });
    }
    function rules()
    {
        return {
            tipoPersona: {required: true,},
            numeroDocumento: {required: true,digits: true,minlength: 11},
            razonSocial: {required: true,},
            direccion: {required: true,},
            activo: {required: true,},
            habido: {required: true,},
            dniRep: {digits: true,minlength: 8},
            nombreRep: {lettersOnly: true},
            apellidoPaternoRep: {lettersOnly: true},
            apellidoMaternoRep: {lettersOnly: true},
            correo: {required: true,},
            celular: {required: true,minlength: 9}
        };
    }
    function save()
    {
        // alert('cascs')
        if($('#fvproveedor').valid()==false)
        {return;}
        var formData = new FormData($("#fvproveedor")[0]);
        // alert('paso la val')
        $('.save').prop('disabled',true);
        $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
        jQuery.ajax(
        { 
            url: "{{ url('panelAdm/paProveedor/guardar') }}",
            data: formData,
            method: 'post',
            dataType: 'json',
            processData: false, 
            contentType: false, 
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r){
                console.log(r);
                $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
                // limpiarForm();
                $('.save').prop('disabled',false);
                msjRee(r);
            }
        });
    }
    function changeTipoPersona()
    {
        if($('.tipoPersona').val()=='PERSONA NATURAL')
        {
            $('.nombre').rules('add', {required: true});
            $('.apellidoPaterno').rules('add', {required: true});
            $('.apellidoMaterno').rules('add', {required: true});
            $('.razonSocial').rules('remove', 'required');
            $('.pj').val('');
            cleanFv('fvproveedor');
            $('.pj').parent().parent().css('display','none');
            $('.pn').parent().parent().css('display','block');
        }
        else
        {
            $('.razonSocial').rules('add', {required: true});
            $('.nombre').rules('remove', 'required');
            $('.apellidoPaterno').rules('remove', 'required');
            $('.apellidoMaterno').rules('remove', 'required');
            $('.pn').val('');
            cleanFv('fvproveedor');
            $('.pn').parent().parent().css('display','none');
            $('.pj').parent().parent().css('display','block');
        }

    }
</script>
@endsection