<?php
	require_once '../util/util.php';

	if($_SESSION['validarID'] == null || $_SESSION['validarID'] == ""){
        header("Location: ../inicio/cierreSesion.php");

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
<div class="pcoded-main-container-password">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
					<h4 class="mb-4 f-w-500 text-center"> Validacion Codigo </h4>
                <form action="validarCodeControl.php" method="post">
					<div class="mb-4">
						<input type="number" minlength="4" name = "codigo" id = "codigo" class="form-control" placeholder="Ingrese el codigo">
					</div>
					<div class="row justify-content-center">		
						<button name = "ValidarCode" id = "ValidarCode" onclick="validarCode()" class="btn btn-primary mb-3">Validar Codigo</button>
					</div>	
                </form>
			</div>
		</div>
	</div>
</div>

<script src="../assets/js/vendor-all.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
	<script>
		let codigo = document.getElementById('codigo');

		function validarCode(){
			if(codigo.value == "" || correo.value == null){
				alert("No puedes degar esta casilla en blanco");
			}
		}
	</script>

</html>