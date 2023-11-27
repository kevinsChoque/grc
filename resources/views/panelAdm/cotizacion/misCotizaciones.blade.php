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
            
    		<h3 class="text-center font-weight-bold font-italic">MIS COTIZACIONES</h3>
    		<form id="fvbuscot">
    		<div class="row">
    			<div class="col-lg-4">
    				<div class="form-group row">
						<label class="col-sm-3 col-form-label">Año:</label>
						<div class="col-sm-6">
							<!-- <input type="text" id="numeroCotizacion" name="numeroCotizacion" class="form-control"> -->
                            <!-- <select name="anio" id="anio" class="form-control">
                                <option disabled>Selecciona una opcion</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2002">2002</option>
                                <option value="2002">2002</option>
                                <option value="2002">2002</option>
                                <option value="2002">2002</option>
                            </select> -->
                            <!-- select>option[value=200$]*24{200$} -->
                            <select name="anio" id="anio" class="form-control">
                                <option disabled>Selecciona una opcion</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023" selected>2023</option>
                            </select>
                            
                            

						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Mes:</label>
						<div class="col-sm-6">
                            <select name="mes" id="mes" class="form-control">
                                <option disabled>Selecciona una opcion</option>
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre" selected>Diciembre</option>
                            </select>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Tipo:</label>
						<div class="col-sm-6">
							<!-- <input type="date" id="fechaInicial" name="fechaInicial" class="form-control"> -->
                            <select name="tipo" id="tipo" class="form-control">
                                <option disabled>Selecciona una opcion</option>
                                <option value="Bienes">Bienes</option>
                                <option value="Servicios">Servicios</option>
                            </select>
						</div>
					</div>
				</div>
    		</div>
            </form>
    	</div>
        <div class="card-footer py-1 border-transparent">
            <button type="button" class="btn btn-light clean"><i class="fa fa-eraser"></i> Limpiar campos de busqueda</button>
            <button type="button" class="btn btn-success float-right searchCot"><i class="fa fa-search"></i> Buscar Cotizacion</button>
        </div>
    </div>
    <div class="card">
        <div class="overlay overlayRegistros">
            <div class="spinner"></div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 contenedorRegistros table-responsive" style="display: none;">
                    <table id="registros" class="table table-hover table-bordered dt-responsive nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center text-uppercase" data-priority="1">-NRO-</th>
                                <th class="text-center text-uppercase" data-priority="1">tipo</th>
                                <th class="text-center text-uppercase" data-priority="1">-FECHA-</th>
                                <th class="text-center text-uppercase" data-priority="2">nro de cotizacion</th>
                                <th class="text-center text-uppercase" data-priority="3">concepto</th>
                                <th class="text-center text-uppercase" data-priority="4">-monto-</th>
                                <th class="text-center text-uppercase" data-priority="4">Estado</th>
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
@include('panelAdm.cotizacion.finalizarCotizacion.mArchivos')
@include('panelAdm.cotizacion.finalizarCotizacion.mEnviarArchivo')
<script>
    localStorage.setItem("sba",4);
    var tablaDeRegistros;
    var flip=0;
    var idCrp = '';
    $(document).ready( function () {
        tablaDeRegistros=$('.contenedorRegistros').html();
     //    initFv('fvbuscot',rules());
    	fillRegistros();
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
    });
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{ url('panelAdm/paCotRecPro/listar') }}",
            method: 'post',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r)
            {
                // console.log('r.data');
                // console.log(r.data);
                // console.log('r.data');
                var html = '';
                var opciones = '';
                for (var i = 0; i < r.data.length; i++) 
                {
                    if(r.data[i].estadoCrp=='1')
                    {
                        opciones = '<span class="badge badge-light shadow"> Cotizacion Enviada</span>';
                    }
                    else
                    {
                        opciones = '<button type="button" class="btn btn-sm btn-primary" onclick="showArchivos('+r.data[i].idCrp+');"><i class="fa fa-download" ></i></button>'+
                            '<button type="button" class="btn btn-sm btn-success ml-1" onclick="mSend('+r.data[i].idCrp+');"><i class="fa fa-paper-plane"></i> Enviar</button>';
                    }
                    html += '<tr>' +
                        '<td class="text-center font-weight-bold">' + (i+1) + '</td>' +
                        '<td class="text-center font-weight-bold">' + novDato(r.data[i].tipo) + '</td>' +
                        '<td class="text-center font-weight-bold">' + r.data[i].frCrp + '</td>' +
                        '<td class="text-center">' + novDato(r.data[i].numeroCotizacion) + '</td>' +
                        '<td class=""><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].concepto) + '</p></td>' +
                        '<td class="text-center">' + novDato('S/. '+r.data[i].total) + '</td>' +
                        '<td class="text-center">' + estadoEnviado(r.data[i].estadoCrp) + '</td>' +
                        '<td class="text-center">' + 
                            opciones + 
                            // '<button type="button" class="btn btn-sm btn-primary" onclick="showArchivos('+r.data[i].idCrp+');"><i class="fa fa-download" ></i></button>'+
                            // '<button type="button" class="btn btn-sm btn-success ml-1" onclick="mSend('+r.data[i].idCrp+');"><i class="fa fa-paper-plane"></i> Enviar</button>'+

                            // '<div class="btn-group btn-group-sm" role="group">'+
                            //     '<button type="button" class="btn btn-info" title="Editar registro" onclick="cotizar('+r.data[i].idCot+');"><i class="far fa-file-alt" ></i></button>'+
                            //     '<button type="button" class="btn btn-success" title="Editar registro" onclick="cotizar('+r.data[i].idCot+');"><i class="far fa-file-alt" ></i></button>'+
                            // '</div>'+
                        '</td></tr>';
                }
                $('#data').html(html);
                initDatatable('registros');
                $('.overlayRegistros').css('display','none');
            }
        });
    }
    function showArchivos(id)
    {
        idCrp = id;
        $('#mArchivos').modal('show');
        // jQuery.ajax(
        // { 
        //     url: "{{url('cotizacion/showCotizacion')}}",
        //     data: {id:id},
        //     method: 'post',
        //     headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        //     success: function(r){
        //         showDataCotizacion(r);
        //     }
        // });
    }
    function mSend(id)
    {
        idCrp = id;
        $('#mSend').modal('show');
    }
    function estadoEnviado(estado)
    {
        let badgeEstado='';
        if(estado == '0') badgeEstado='<span class="badge badge-light">PENDIENTE</span>';
        if(estado == '1') badgeEstado='<span class="badge badge-success">ENVIADO</span>';
        return badgeEstado
    }
    function construirTabla()
    {
        $('.contenedorRegistros>div').remove();
        $('.contenedorRegistros').html(tablaDeRegistros);
    }
</script>
@endsection