@extends('plantilla.plantilla')
@section('pageTitle')
<div class="content-header pb-0 pt-2" style="display: none;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Cotizaciones Activas</h1></div>
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
    	<div class="card-body">
    		<h3 class="text-center font-weight-bold font-italic">ENVIE SU COTIZACION</h3>
    		<form action="fvbuscot">
    		<div class="row">
    			<div class="col-lg-12">
    				<div class="form-group row">
						<label class="col-sm-2 col-form-label text-right">Cotizacion: <span class="text-danger">*</span></label>
						<div class="col-sm-9">
							<input type="text" id="numeroCotizacion" name="numeroCotizacion" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Tipo de persona: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="descripcion" name="descripcion" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Nro. Documento (RUC): <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="descripcion" name="descripcion" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-12">
    				<div class="form-group row">
						<label class="col-sm-2 col-form-label text-right">Nombres: <span class="text-danger">*</span></label>
						<div class="col-sm-9">
							<input type="text" id="numeroCotizacion" name="numeroCotizacion" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Celular: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="descripcion" name="descripcion" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Correo: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="descripcion" name="descripcion" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Tiempo de Entrega: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="descripcion" name="descripcion" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Tiempo Validez: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="descripcion" name="descripcion" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Se dedica al objeto de contratacion: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="descripcion" name="descripcion" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Tiempo de garantia: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="descripcion" name="descripcion" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					
				</div>
				<!-- -- -->
				
    		</div>
    		<div class="row">
                <div class="col-lg-12">
                	<div class="table-responsive">
	                    <table class="w-100 table table-hover table-striped table-bordered">
	                        <thead>
	                            <tr class="text-center">
	                                <th width="30%">Nombre</th>
	                                <th width="10%">Clasificador</th>
	                                <th width="8%">marca</th>
	                                <th width="7%">modelo</th>
	                                <th width="10%">U.Medida</th>
	                                <th width="5%">Cantidad</th>
	                                <th width="15%">Precio</th>
	                                <th width="15%">Opc.</th>
	                            </tr>
	                        </thead>
	                        <tbody id="listItems">
	                            <!-- <tr class="text-center">
	                                <th colspan="6">Sin items</th>
	                            </tr> -->
	                        </tbody>
	                        <tfoot>
	                        	<tr>
	                        		<td colspan="7" class="text-right">TOTAL:</td>
	                        		<td colspan="1" class="text-center">TOTAL</td>
	                        	</tr>
	                        </tfoot>
	                    </table>
                    </div>
                </div>
            </div>
    		</form>
    	</div>
    </div>
</div>
<script>
    $(document).ready( function () {
    	// fillRegistros();
    	loadItemsCotizacion()
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
    });
    function loadItemsCotizacion()
	{
	    jQuery.ajax({
	        url: "{{ url('cotxitm/loadSegunCotizacion') }}",
	        method: 'POST', 
	        data: {idCot:localStorage.getItem('idCot')},
	        dataType: 'json',
	        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
	        success: function (r) {
	            console.log(r);
	            let idFila = '';
	            var html = '';
	            for (var i = 0; i < r.data.length; i++) 
	            {
	                idFila = localStorage.getItem('idCot')+r.data[i].idItm;
	                html += '<tr class="fila'+idFila+'">' +
	                    '<td class="font-weight-bold">' + novDato(r.data[i].nombre) +'</td>' +
	                    '<td class="text-center">' + novDato(r.data[i].clasificador) + '</td>' +
	                    '<td class="text-center">' + 'marca' + '</td>' +
	                    '<td class="text-center">' + 'modelo' + '</td>' +
	                    '<td class="text-center"><span class="font-weight-bold badge badge-light shadow um'+idFila+'">'+ novDato(r.data[i].nombreUm) +
	                    '</td>' +
	                    '<td class="text-center">' + r.data[i].cantidad + '</td>' +
	                    '<td class="text-center">' + 
	                        '<div class="input-group">' +
	                            '<div class="input-group-prepend">' +
	                                '<span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i></span>' +
	                            '</div>' + 
	                            '<input type="text" class="form-control" onblur="changeCant(this,'+r.data[i].idItm+');" value="'+novDato(r.data[i].cantidad)+'">' +
	                        '</div>' +
	                    '</td>' +
	                    '<td class="text-center">' + 
	                        '<div class="input-group">' +
	                            '<div class="input-group-prepend">' +
	                                '<span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i></span>' +
	                            '</div>' + 
	                            '<input type="text" class="form-control text-center" onblur="changeCant(this,'+r.data[i].idItm+');" value="subtotal" disabled>' +
	                        '</div>' +
	                    '</td>' +
	                '</tr>';
	            }
	            $('#listItems').html(html);
	        },
	        error: function (xhr, status, error) {
	            alert('salio un error');
	        }
	    });
	}
    // function fillRegistros()
    // {
    //     $('.contenedorRegistros').css('display','block');
    //     jQuery.ajax(
    //     { 
    //         url: "{{ url('panelAdm/paCotizacion/listar') }}",
    //         method: 'get',
    //         success: function(r)
    //         {
    //             // console.log(r.data);
    //             var html = '';
    //             for (var i = 0; i < r.data.length; i++) 
    //             {
    //                 html += '<tr>' +
    //                     '<td class="text-center font-weight-bold">' + novDato(r.data[i].tipo) + '</td>' +
    //                     '<td class="text-center">' + novDato(r.data[i].numeroCotizacion) + '</td>' +
    //                     '<td class=""><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].concepto) + '</p></td>' +
    //                     '<td class=""><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].descripcion) + '</p></td>' +
    //                     '<td class="text-center">' + novDato(r.data[i].fechaFinalizacion) + '</td>' +
    //                     '<td class="text-center">' + 
    //                         '<div class="btn-group btn-group-sm" role="group">'+
    //                             '<button type="button" class="btn text-info" title="Editar registro" onclick="cotizar('+r.data[i].idCot+');"><i class="fa fa-edit" ></i></button>'+
    //                         '</div>'+
    //                     '</td></tr>';
    //             }
    //             $('#data').html(html);
    //             initDatatable('registros');
    //             $('.overlayRegistros').css('display','none');
    //         }
    //     });
        
    // }
    // function cotizar(id)
    // {
    // 	localStorage.setItem("idCot",id);
    //     window.location.href = "{{url('portal/paCotizacion/cotizar')}}";
    // }
</script>
@endsection