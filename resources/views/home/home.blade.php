@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">--</h6>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <button class="btn btn-sm btn-success float-right btnPmsRegistrar" data-toggle="modal" data-target="#modalRegistrar" style="display: none;">
                <i class="fa fa-plus"></i> 
                Nuevo registro
            </button>
        </div>
    </div>
</div>
@endsection
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay dark overlayRegistros">
                    <img src="{{asset('img/imgAdicionales/spinerLetter2.svg')}}" class="svgLoadLetter">
                </div>
            	<div class="card-header border-transparent py-2">
					<h3 class="card-title m-0 font-weight-bold"><i class="fa fa-user-tie"></i> --</h3>
				</div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <h1>table stadics</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
        
    });
</script>
@endsection