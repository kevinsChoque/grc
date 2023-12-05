@extends('plantilla.plantilla')
@section('pageTitle')
<div class="content-header pb-0 pt-2" style="display: none;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0"></h1></div>
            <div class="col-sm-6">
                <a href="{{url('panelAdm/paProveedor/datos')}}" class="btn btn-success float-right"><i class="fa fa-cogs"></i> Mis datos</a>
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
            <!-- <div class="spinner"></div> -->
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
    	<div class="card-body">
    		<h3 class="text-center font-weight-bold font-italic">Formatos de cotizacion</h3>
            <div class="row">
                <div class="col-lg-2">
                    <!-- <button class="btn btn-success shadow" onclick="showCci()">cci</button> -->
                    <div class="card bg-teal shadow" style="cursor: pointer;" onclick="showDj()">
                        <div class="card-body p-2">
                            <p class="m-0 text-center"><i class="fa fa-file-pdf"></i> Declaracion Jurada</p>
                        </div>
                    </div>
                    <div class="card bg-olive shadow" style="cursor: pointer;" onclick="showCci()">
                        <div class="card-body p-2">
                            <p class="m-0 text-center"><i class="fa fa-file-pdf"></i> CCI</p>
                        </div>
                    </div>
                    <div class="card bg-lightblue shadow" style="cursor: pointer;" onclick="showAnexo5()">
                        <div class="card-body p-2">
                            <p class="m-0 text-center"><i class="fa fa-file-pdf"></i> Anexo 5</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 contentPdf">
                    <!-- <img src="https://img.freepik.com/vector-premium/icono-documento-icono-perfecto-pixel-profesional-optimizado-resoluciones-grandes-pequenas_775815-282.jpg" class="w-100"> -->
                    <div class="card bg-secondary banerPdf">
                        <div class="card-body text-center">
                            <img src="{{asset('img/panelAdm/formatos.png')}}" class="w-50">
                        </div>
                    </div>
                    <embed src="" id="pdfViewer" class="w-100" style="height: 100vh;">
                </div>
            </div>
    	</div>

        <!-- <div class="card-footer py-1 border-transparent">
            <button type="button" class="btn btn-success float-right save"><i class="fa fa-lock"></i> Cambiar contraseña</button>
        </div> -->
    </div>
    <div class="card">
        <div class="card-body">
            <!-- <embed src="" id="pdfViewer" class="w-75" style="height: 500px;"> -->
        </div>
    </div>
</div>
<script>
    localStorage.setItem("sba",6);
    var flip=0;
    $(document).ready( function () {
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
    });
    function showCci()
    {
        $.ajax({
            url: "{{route('saveCciDel')}}", // Ruta al script PHP que genera el PDF
            method: 'get',
            success: function(r) {
                console.log(r);
                var dir = "{{route('formatos-file')}}/"+r.pdf;
                $('#pdfViewer').attr('src',dir);
                $('.banerPdf').remove();
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener el PDF:', status, error);
            }
        });
    }
    function showDj()
    {
        $.ajax({
            url: "{{route('saveDjDel')}}", // Ruta al script PHP que genera el PDF
            method: 'get',
            success: function(r) {
                console.log(r);
                var dir = "{{route('formatos-file')}}/"+r.pdf;
                $('#pdfViewer').attr('src',dir);
                $('.banerPdf').remove();
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener el PDF:', status, error);
            }
        });
    }
    function showAnexo5()
    {
        $.ajax({
            url: "{{route('saveAnexo5Del')}}", // Ruta al script PHP que genera el PDF
            method: 'get',
            success: function(r) {
                console.log(r);
                var dir = "{{route('formatos-file')}}/"+r.pdf;
                $('#pdfViewer').attr('src',dir);
                $('.banerPdf').remove();
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener el PDF:', status, error);
            }
        });
    }
    
    
</script>
@endsection