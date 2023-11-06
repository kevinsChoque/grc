<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>AdminLTE 3 | Log in (v2)</title>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css')}}">
	<!-- spiner style -->
	<link rel="stylesheet" href="{{asset('css/spinerLogin.css')}}">
</head>
<body class="hold-transition login-page">
	<div class="overlayPagina">
	    <div class="loadingio-spinner-spin-i3d1hxbhik m-auto">
	        <div class="ldio-onxyanc9oyh">
	            <div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div>
	        </div>
	    </div>
	</div>
	<div class="login-box">
	  	<div class="card card-outline card-primary">
		    <div class="card-header text-center">
		      	<a href="../../index2.html" class="h1"><b>Cotizaciones </b>Apurimac</a>
		    </div>
	    	<div class="card-body">
	      		<p class="login-box-msg">Bienvenido, ingrese con su cuenta.</p>
	      		<form id="login">
			        <div class="input-group mb-3">
			          	<input type="email" class="form-control" placeholder="Email">
			         	<div class="input-group-append">
				            <div class="input-group-text"><span class="fas fa-user"></span></div>
			          	</div>
			        </div>
			        <div class="input-group mb-3">
			          	<input type="password" class="form-control" placeholder="Password">
			          	<div class="input-group-append">
				            <div class="input-group-text"><span class="fas fa-lock"></span></div>
			          	</div>
			        </div>
			        <div class="row">
			          	<div class="col-8">
				            <div class="icheck-primary">
				              	<input type="checkbox" id="remember">
				              	<label for="remember">
				                	Remember Me
				              	</label>
				            </div>
			          	</div>
			          	<div class="col-4"><button class="btn btn-primary btn-block" onclick="ingresar();">Ingresar</button></div>
			        </div>
	      		</form>
		      	<!-- <div class="social-auth-links text-center mt-2 mb-3">
			        <a href="#" class="btn btn-block btn-primary">
			          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
			        </a>
			        <a href="#" class="btn btn-block btn-danger">
			          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
			        </a>
		      	</div> -->
	      		<!-- <p class="mb-1"><a href="forgot-password.html">Olvido su contraseña</a></p> -->
	      		<p class="mb-0"><a href="register.html" class="text-center">Registrarse</a></p>
	    	</div>
	  	</div>
	</div>
<!-- jQuery -->
<script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte3/dist/js/adminlte.min.js')}}"></script>
<script>
	$(document).ready( function () {
        $('.overlayPagina').css("display","none");
    } );
    function ingresar()
    {
    	// alert('cascsc');
    	window.location.href = "{{url('home/home')}}";
    }
</script>
</body>
</html>
