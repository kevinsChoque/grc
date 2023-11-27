<!-- modal mArchivos -->
<div class="modal fade" id="mSend" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-doctor"></i> Enviar Archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<form id="fvsend">
    				<div class="row">
                        <div class="col-lg-12">
                            <div class="callout callout-info">
                                <h5>Sobre el archivo</h5>
                                <p class="m-0"><strong>Su oferta economica debera ser entregada en formato digital (PDF) mediante este cuadro, todos los archivos juntos en un solo PDF.</strong></p>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="m-0">Archivos: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="file" class="form-control file" id="file" name="file">
                            </div>
                        </div>
    				</div>
            	</form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success float-right sendCotPro ml-2" style="display: none;"><i class="fa fa-paper-plane"></i> Enviar</button>
            </div>
        </div>
    </div>
</div>
<script>	
$(document).ready( function () {
    // initValidateItem();
    initFv('fvsend',rules());
});
$('.sendCotPro').on('click',function(){
    sendCotPro();
});
$('.file').on('change',function(){
    // showBtnSend()
    // alert('ver');
    $('.sendCotPro').css('display','block');
});
// $("#mSend").on("hidden.bs.modal", function () {
//     alert('se cerro el modal');
//     $('.file').val('');
//     $('.sendCotPro').css('display','none');
// });

function rules()
{
    return {
        file: {
            required: true,
        },
    };
}
function sendCotPro()
{
    if($('#fvsend').valid()==false)
    {return;}
    var formData = new FormData($("#fvsend")[0]);
    formData.append('idCrp', idCrp); 
    // formData.append('file', $('#archivo')[0].files.length>0?'true':'false');
    // $('.sendCotPro').prop('disabled',true); 
    jQuery.ajax({
        url: "{{ url('panelAdm/paCotRecPro/subirArchivo') }}",
        method: 'POST', 
        data: formData,
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            if (r.estado) 
            {
                limpiarFormSend();
                // procedure(r);
                construirTabla();
                fillRegistros();
                $('#mSend').modal('hide');
            } 
            msjRee(r);
            // $('.sendCotPro').prop('disabled',false); 
        },
        error: function (xhr, status, error) {
            msjSimple(false,'Algo salio mal, porfavor contactese con el Administrador.');
        }
    });
}
function limpiarFormSend()
{
    cleanFv('fvsend');
    $('.file').val('');
    $('.sendCotPro').css('display','none');
}
</script>