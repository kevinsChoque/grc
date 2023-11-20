<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GOBIERNO REGIONAL DE APURIMAC</title>
    <link rel="icon" href="{{asset('img/admin/funcionarios/icono.jpg')}}" type="image/x-icon">
    <!-- jQuery -->
<script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css')}}">
    <style>
    	.hoverLink:hover{
    		color: #1b00ff !important;
    	}
    </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
	<div class="container-fluid my-5">
		<div class="row align-middle justify-content-center">
			<div class="callout callout-info">
				<h5><a href="{{url('login/login')}}" class="btn btn-link hoverLink"><i class="fas fa-user-tie"></i> PANEL ADMINISTRATIVO DEL FUNCIONARIO:</a></h5>
					Panel de administracion de los usuarios de cotizacion y administracion, gestion de cotizaciones.
			</div>
			<div class="callout callout-info ml-2">
				<h5><a href="{{url('loginProveedor/loginProveedor')}}" class="btn btn-link hoverLink"><i class="fas fa-user"></i> PANEL ADMINISTRATIVO DEL PROVEEDOR:</a></h5>
					Panel administrativo de los proveedores, es un medio para postular a las cotizaciones
			</div>
		</div>
	</div>
<!-- jQuery -->
<script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('adminlte3/dist/js/adminlte.js')}}"></script>
<!-- jquery validate -->
<!-- transJQV -->
</body>
</html>
