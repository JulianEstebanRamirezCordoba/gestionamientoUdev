<html lang="en">
<head>
<?php
session_start();
if($_SESSION['cambio_pass'] == null || $_SESSION['cambio_pass'] == ""){
	header("Location: ../inicio/cierreSesion.php");

}
?> 

	<title>Rest Contraseña</title>

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
				<h4 class="mb-4 f-w-450 text-center"> Contraseña nueva </h4>

                <form action="RestValPassControlador.php" method="post">
                	<div class="form-group" id="passwordIni">
                        <input type="password" name="password" minlength="4" maxlength="20" onkeyup="validarCampos()" id="password" class=" form-control span4 " placeholder="Contraseña" tabindex="2" required> 
                    </div>
                    <div class="form-group" id="passwordVal">
                        <input type="password" onkeyup="validarCampos()" name="passwordConfi" id="passwordConfi" tabindex="2" class=" form-control span4" placeholder="Confirmar contraseña" required>
                    </div>
					<div class="row justify-content-center">		
						<button name = "modificarPass" id="modificarPass" disabled = "true" class="btn btn-primary mb-3">Cambiar Contraseña</button>
					</div>	
                </form>
			</div>
		</div>
	</div>
</div>
	<script src="../assets/js/vendor-all.min.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
	<script>
		function validarCampos(){
		let passIni = document.getElementById('password').value;
		let passConfi = document.getElementById('passwordConfi').value;

			if(passIni != null && passConfi != null){
				if(passIni == passConfi){
					document.getElementById('modificarPass').disabled = false;

				}else{
					document.getElementById('modificarPass').disabled = true;
				}
			}
		}
			



	</script>

</body>
</html>