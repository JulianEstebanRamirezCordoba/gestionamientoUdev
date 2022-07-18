<?php
	define("tipo", 3);

	require_once '../util/util.php';
	define("USUARIOVALIDO", tipo);

	if(isset($_SESSION['usuario']) && isset($_SESSION['datosUsuarios'])){
		$inicioSeguro = new util();
		$inicioSeguro->activoUsuario(tipo);

	}

?>
<head>
	<title>Gestionamiento UDEV</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Flash Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
	<meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
	<meta name="author" content="Codedthemes" />

	
	<link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
	
	<link rel="stylesheet" href="../assets/fonts/fontawesome/css/fontawesome-all.min.css">
	
	<link rel="stylesheet" href="../assets/plugins/animation/css/animate.min.css">


	<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<div class="auth-wrapper">
	<div class="auth-content container">
		<div class="card">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="card-body">
						<img src="../assets/img/logo-udev.png" alt="" class="img-fluid mb-4">
						<h4 class="mb-2 f-w-450">Inicio sesion en tu cuenta</h4>

                        <form action="seguridad.php" method="post">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="feather icon-mail"></i></span>
							</div>
							<input type="email" name = "email" id = "email" class="form-control" placeholder="correo o Ususario electronico">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="feather icon-lock"></i></span>
							</div>
							<input type="password" name = password id = "password" class="form-control" placeholder="contraseña">
						</div>  
						<button type = "input" class="btn btn-primary mb-3" name="btnGuardar" id="guardar">Iniciar sesion</button>
                        </form>

						<p class="mb-3 text-muted">Olvidastes tu contaseña ?   <a href="../restaurarContraseña/visualEnvioCorr.php" class="f-w-450"> Restablecer mi contraceña</a></p>
					</div>
				</div>
				<div class="col-md-6 d-none d-md-block">
					<img src="../assets/img/auth-bg.jpg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../assets/js/vendor-all.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>


<div class="footer-fab">
    <div class="b-bg">
        <i class="fas fa-question"></i>
    </div>
    <div class="fab-hover">
        <ul class="list-unstyled">
            <li><a href="" target="_blank" data-text="Creadores Time Admin" class="btn btn-icon btn-rounded btn-info m-0"><i class="feather icon-layers"></i></a></li>
            <li><a href="" target="_blank" data-text="Manual Time Admin" class="btn btn-icon btn-rounded btn-primary m-0"><i class="feather icon feather icon-book"></i></a></li>
        </ul>
    </div>
</div>


</body>

</html>