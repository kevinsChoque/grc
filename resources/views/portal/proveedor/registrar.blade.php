<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>GOBIERNO REGIONAL DE APURIMAC</title>
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
	<!-- sweetalert2 -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <script src="{{asset('adminlte3/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- helper -->
    <script src="{{asset('js/helper.js')}}"></script>
</head>
<body class="hold-transition login-page">
	<div class="overlayPagina">
	    <div class="loadingio-spinner-spin-i3d1hxbhik m-auto">
	        <div class="ldio-onxyanc9oyh">
	            <div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div>
	        </div>
	    </div>
	</div>
	<div class="login-box" style="width: 560px;">
	  	<div class="card">
		    <div class="card-header text-center">
		      	<h3 class="text-left">REGISTRATE AQUÍ</h3>
		      	<p class="m-0 text-left">Ingresa tus datos para generar una cuenta</p>
		    </div>
	    	<div class="card-body">
	    		<form id="fvregpro">
	    		
                <!-- <div class="row"> -->
                    <!-- <div class="form-group col-lg-4">
                        <label class="m-0 text-uppercase">RUC:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" id="ruc" name="ruc" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-lg-8">
                        <label class="m-0 text-uppercase">Razon Social:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" id="razonSocial" name="razonSocial" class="form-control">
                        </div>
                    </div> -->
                <!-- </div> -->
                <div class="form-group row">
					<label class="col-sm-3 col-form-label">RUC: <span class="text-danger">*</span></label>
					<div class="col-sm-9">
						<input type="text" id="ruc" name="ruc" class="form-control soloNumeros" placeholder="RUC" maxlength="11">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Razon social: <span class="text-danger">*</span></label>
					<div class="col-sm-9">
						<input type="text" id="razonSocial" name="razonSocial" class="form-control" placeholder="Razon social">
					</div>
				</div>
                <div class="form-group row">
					<label class="col-sm-3 col-form-label">Nro de celular: <span class="text-danger">*</span></label>
					<div class="col-sm-9">
						<input type="text" id="celular" name="celular" class="form-control soloNumeros" placeholder="Celular" maxlength="9">
					</div>
				</div>
                <!-- <div class="form-group col-lg-12">
                    <label class="m-0 text-uppercase">Correo:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" id="correo" name="correo" class="form-control">
                    </div>
                </div> -->
                <div class="form-group row">
					<label class="col-sm-3 col-form-label">Correo <span class="text-danger">*</span></label>
					<div class="col-sm-9">
						<input type="text" id="correo" name="correo" class="form-control" placeholder="Correo">
					</div>
				</div>
                <!-- <div class="form-group col-lg-12">
                    <label class="m-0 text-uppercase">Confirmar correo:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" id="confirmarCorreo" name="confirmarCorreo" class="form-control">
                    </div>
                </div> -->
                <div class="form-group row">
					<label class="col-sm-3 col-form-label">Confirmar correo: <span class="text-danger">*</span></label>
					<div class="col-sm-9">
						<input type="text" id="confirmarCorreo" name="confirmarCorreo" class="form-control" placeholder="Confirmar correo">
					</div>
				</div>
                <!-- <div class="form-group col-lg-12">
                    <label class="m-0 text-uppercase">nro de celular:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" id="celular" name="celular" class="form-control">
                    </div>
                </div> -->
				<div class="col-12">
                    <a class="btn btn-primary w-100 regPro"><i class="fa fa-user-plus"></i> REGISTRAR</a>
                </div>
                <div class="col-12">
                    <a class="btn btn-link w-100">SI YA TIENES UNA CUENTA HAZ CLIC AQUÍ</a>
                </div>
                </form>
	    	</div>
	  	</div>
	</div>
<!-- jQuery -->
<script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
<!-- validate -->
<script src="{{asset('adminlte3/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte3/dist/js/adminlte.min.js')}}"></script>
<script>
	$(document).ready( function () {
		initFv('fvregpro',rules());
        $('.overlayPagina').css("display","none");
    } );
    // function ingresar()
    // {
    // 	window.location.href = "{{url('home/home')}}";
    // }
    
    // $('.entrar').on('click',function(){
    // 	alert('enviar data desde entrar')
    // });
    // $('.sig-in').on('click',function(){
    //     if($('#fvlogin').valid()==false)
    //     {return;}
    //     var formData = new FormData($("#fvlogin")[0]);
    //     $('.sig-in').prop('disabled',true); 
    //     $('.overlayPagina').css("display","flex");
    //     jQuery.ajax({
    //         url: "{{ url('login/sigin') }}",
    //         method: 'POST', 
    //         data: formData,
    //         dataType: 'json',
    //         processData: false, 
    //         contentType: false, 
    //         headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
    //         success: function (r) {
    //             if (r.estado) 
    //                 window.location.href = "{{url('home/home')}}";
    //             else 
    //             {
    //             	$('.overlayPagina').css("display","none");
    //             	$('.sig-in').prop('disabled',false);
    //                 msjRee(r); 
    //             }
    //         },
    //         error: function (xhr, status, error) {
    //             $('.overlayPagina').css("display","none");
    //             $('.sig-in').prop('disabled',false);
    //             msjSimple(false,'Ocurrio un problema, porfavor contactese con el administrador');
    //         }
    //     });
    // });
    $('.regPro').on('click',function(){
    	regPro()
    });
    function regPro()
	{
	    if($('#fvregpro').valid()==false)
	    {return;}
	    var formData = new FormData($("#fvregpro")[0]);
	    // formData.append('id', idDocumento); 
	    // formData.append('file', $('#archivo')[0].files.length>0?'true':'false');
	    $('.regPro').prop('disabled',true); 
	    $('.overlayPagina').css("display","flex");
	    jQuery.ajax({
	        url: "{{ url('portal/proveedor/guardar') }}",
	        method: 'POST', 
	        data: formData,
	        dataType: 'json',
	        processData: false, 
	        contentType: false, 
	        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
	        success: function (r) {
	            if (r.estado) 
	                Swal.fire({
	                    title: "COTIZACION",
	                    text: r.message,
	                    icon: "success",
	                    showCancelButton: true,
	                    confirmButtonColor: "#3085d6",
	                    confirmButtonText: "OK",
	                    allowOutsideClick: false, 
	                    allowEscapeKey: false, 
	                    showCancelButton: false,
	                }).then((result) => {
	                    if (result.isConfirmed) {
                            $('.overlayPagina').css("display","none");
	                        window.location.href = "{{url('loginProveedor/loginProveedor')}}";
	                    }
	                });
	            else 
	                msjRee(r); 
                $('.overlayPagina').css("display","none");
	            $('.regPro').prop('disabled',false); 
	        },
	        error: function (xhr, status, error) {
	            msjSimple(false,"Ocurrio un error porfavor contactese con el Administrador.")
	        }
	    });
	}
    function rules()
    {
        return {
            ruc: {
                required: true,
            },
            razonSocial: {
                required: true,
            },
            correo: {
                required: true,
            },
            confirmarCorreo: {
                required: true,
            },
            celular: {
                required: true,
            },
        };
    }
</script>
</body>
</html>
