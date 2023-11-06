<!-- modal modalRegistrar -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-car-tunnel"></i> Nueva ruta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValidateReg">
                <div class="row contenedorFormularioRegistrar">
                    <div class="form-group col-lg-12">
                        <label for="" class="m-0">Nombre: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa-solid fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="" class="m-0">Observacion:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa-solid fa-angle-right"></i></span>
                            </div>
                            <textarea name="observacion" id="observacion" class="form-control form-control-sm" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success guardar"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- modal modalEditar -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-car-tunnel"></i> Editar ruta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValidateEdit">
                <div class="row contenedorFormularioEditar">
                    <input type="hidden" id="idRuta" name="idRuta">
                    <div class="form-group col-lg-12">
                        <label for="" class="m-0">Nombre: <span class="text-danger">*</span></label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa-solid fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="enombre" name="enombre">
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="" class="m-0">Observacion:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa-solid fa-angle-right"></i></span>
                            </div>
                            <textarea name="eobservaion" id="eobservacion" class="form-control form-control-sm" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success guardarCambios"><i class="fa fa-save"></i> Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- <script src="{{asset('js/modificacionJqueryValidate.js')}}"></script> -->
<script>    
$('.guardar').on('click',function(){
    guardar();
});
$('.guardarCambios').on('click',function(){
    guardarCambios();
});
function data(tipo)
{
    // segun la accion enviara datos de editar o registrar
    let segunAccion=tipo?'':'e';
    return {
        nombre:$('#'+segunAccion+'nombre').val(),
        observacion:$('#'+segunAccion+'observacion').val(),
    }
}
function guardar()
{
    if($('#formValidateReg').valid()==false)
    {   return;}
    jQuery.ajax(
    { 
        url: __API__+"ruta/registrar",
        data: data(true),
        method: 'post',
        success: function(result){
            console.log(result);
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            construirTabla();
            fillRegistros();
            limpiarForm();
            $('#modalRegistrar').modal('hide');
            msjRee(result);
        }
    });
}
function editar(id)
{
    jQuery.ajax(
    { 
        url: __API__+'ruta/editar',
        data: {id:id},
        method: 'post',
        success: function(result){
            // console.log(result);
            $('#idRuta').val(result.data.idRuta);
            $('#enombre').val(result.data.nombre);
            $('#eobservacion').val(result.data.observacion);
            $('#modalEditar').modal('show');
        }
    });
}
function guardarCambios()
{
    if($('#formValidateEdit').valid()==false)
    {return;}
    var idRuta = {idRuta: $('#idRuta').val(),};
    var datos = data(false);
    Object.assign(datos,idRuta);
    jQuery.ajax(
    { 
        url: __API__+'ruta/guardarCambios',
        data: datos,
        method: 'post',
        success: function(result){
            // console.log(result);
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            construirTabla();
            fillRegistros();
            $('#modalEditar').modal('hide');
            msjRee(result);
        }
    });
}
$("#formValidateReg").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        nombre: "required",
    },
});
$("#formValidateEdit").validate({
    errorClass: "text-danger font-italic font-weight-normal",
    ignore: ".ignore",
    rules: {
        enombre: "required",
    },
});
</script>