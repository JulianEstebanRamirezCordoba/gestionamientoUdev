<html lang="en">

<head>

	<title>Gestionaminetos</title>

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
	<div class=" pcoded-main-container">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<img src="../assets/img/img_Agregadas/imagenSeguridad.png" alt="img-fluid mb-5">
					<h4 class="mb-4 f-w-450" >Restablecer contraseña</h4>

                	<form action="controladorEnvioCorr.php" method="post">
						<div class="input-group mb-4">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="feather icon-mail"></i></span>
							</div>
						<input type="email" name = "Validaemail" id = "Validaemail" class="form-control" placeholder="Correo electronico existente">
							</div>  
							<button name = "enviarCorreo" id = "botonEnviar" class="btn btn-primary mb-3" onclick="validarMandarDatos()">Enviar Codigo</button>
							<button name = "cerrar" class="btn btn-primary mb-3">Cancelar</button>
                	</form>
				</div>
			</div>
		</div>
	</div>
	<script src="../assets/js/vendor-all.min.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>

		function validarMandarDatos(){
			let correo = document.getElementById("Validaemail").value;
			if(correo === "" || correo === null){
				Swal.fire(
  				'Alerta',
  				'Correo Inesistente por favor ingrese un correo existente',
  				'error'
				) 
			}
		}

	</script>

</body>
</html>


