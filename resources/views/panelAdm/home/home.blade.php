@extends('plantilla.plantilla')
@section('contentPanelAdmin')
<div class="container-fluid">
    <div class="row">
        <h1>PANEL ADMINISTRATIVO</h1>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
        
    });
</script>
@endsection