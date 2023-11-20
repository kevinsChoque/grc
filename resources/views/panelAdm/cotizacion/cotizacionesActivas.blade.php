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
    		<h3 class="text-center font-weight-bold font-italic">COTIZACIONES EN LINEA</h3>
    		<form action="fvbuscot">
    		<div class="row">
    			<div class="col-lg-6">
    				<div class="form-group row">
						<label class="col-sm-3 col-form-label">Nro de cotizacion: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="numeroCotizacion" name="numeroCotizacion" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Descripcion: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="descripcion" name="descripcion" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Fecha Inicial: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="fechaInicial" name="fechaInicial" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Fecha Final: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="fechaFinal" name="fechaFinal" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Tipo: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<select name="tipo" id="tipo" class="form-control">
								<option disabled> Seleccione una opcion</option>
								<option value="Servicios">BIENES</option>
								<option value="Bienes">SERVICIOS</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">-- <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="ruc" name="ruc" class="form-control">
						</div>
					</div>
				</div>
    		</div>
    		</form>
    	</div>
    </div>
    <div class="card">
    	<div class="card-body">
    		<div class="row">
                <div class="col-md-12 contenedorRegistros table-responsive" style="display: none;">
                    <table id="registros" class="table table-hover table-bordered dt-responsive nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center text-uppercase" data-priority="1">tipo</th>
                                <th class="text-center text-uppercase" data-priority="2">nro de cotizacion</th>
                                <th class="text-center text-uppercase" data-priority="3">concepto</th>
                                <th class="text-center text-uppercase" data-priority="4">descripcion</th>
                                <th class="text-center text-uppercase" data-priority="4">fecha limite</th>
                                <th class="text-center text-uppercase" data-priority="1">Opc.</th>
                            </tr>
                        </thead>
                        <tbody id="data">
                        </tbody>
                    </table>
                </div>
            </div>
    	</div>
    </div>
</div>
<script>
    localStorage.setItem("sba",5);
    $(document).ready( function () {
    	fillRegistros();
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
    });
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{ url('panelAdm/paCotizacion/listar') }}",
            method: 'get',
            success: function(r)
            {
                // console.log(r.data);
                var html = '';
                for (var i = 0; i < r.data.length; i++) 
                {
                    html += '<tr>' +
                        '<td class="text-center font-weight-bold">' + novDato(r.data[i].tipo) + '</td>' +
                        '<td class="text-center">' + novDato(r.data[i].numeroCotizacion) + '</td>' +
                        '<td class=""><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].concepto) + '</p></td>' +
                        '<td class=""><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].descripcion) + '</p></td>' +
                        '<td class="text-center">' + novDato(r.data[i].fechaFinalizacion) + '</td>' +
                        '<td class="text-center">' + 
                            '<div class="btn-group btn-group-sm" role="group">'+
                                '<button type="button" class="btn text-info" title="Editar registro" onclick="cotizar('+r.data[i].idCot+');"><i class="far fa-file-alt" ></i></button>'+
                            '</div>'+
                        '</td></tr>';
                }
                $('#data').html(html);
                initDatatable('registros');
                $('.overlayRegistros').css('display','none');
            }
        });
        
    }
    function cotizar(id)
    {
    	localStorage.setItem("idCot",id);
        window.location.href = "{{url('panelAdm/paCotizacion/cotizar')}}";
    }
</script>
@endsection