<!-- modal mArchivos -->
<div class="modal fade" id="mArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-doctor"></i> Archivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<form id="fvitem">
    				<div class="row">
                        <div class="col-lg-3 text-center">
                            
                            <!-- <a href="{{route('pdf-cotizacion')}}" target="_blank" class="btn btn-app shadow bg-purple"> -->
                            <a href="{{route('cotizacion-llenada')}}" target="_blank" class="btn btn-app shadow bg-purple">
                                <i class="fas fa-file-pdf"></i> Descargar Cotizacion Llenada
                            </a>
                            <!-- <a href="{{url('comprobante/c80mm')}}/'+r.data[i].idVen+'" class="btn text-secondary" target="_blank"><i class="fa fa-file-pdf"></i> Comprobante</a> -->
                        </div>  
                        <div class="col-lg-3 text-center">
                            <a href="{{route('cci')}}" target="_blank" class="btn btn-app shadow bg-purple">
                                <i class="fas fa-file-pdf"></i> Descargar CCI
                            </a>
                        </div> 
                        <div class="col-lg-3 text-center">
                            <a href="{{route('declaracion-jurada')}}" target="_blank" class="btn btn-app shadow bg-purple">
                                <i class="fas fa-file-pdf"></i> Descargar Declaracion Jurada
                            </a>
                        </div> 
                        <div class="col-lg-3 text-center">
                            <a href="{{route('anexo5')}}" target="_blank" class="btn btn-app shadow bg-purple">
                                <i class="fas fa-file-pdf"></i> ANEXO 5
                            </a>
                        </div> 
    				</div>
            	</form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>
<script>	

</script>