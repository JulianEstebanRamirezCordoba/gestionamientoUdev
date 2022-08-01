<!DOCTYPE html>
<html lang="en">
<head>

	<?php
session_start();

	  include_once "../util/util.php";
	  $util = new util();

		if($_SESSION['usuario'] != null || $_SESSION['usuario'][0] != null){
			define("nombreUsuario", $_SESSION['datosUsuarios'][0]);
			define("apellidoUsuario", $_SESSION['datosUsuarios'][1]);
			$admin = 0;
			$docentes = 1;
			$monitor = 2;
			$extra = 3;

		}else{
			header("Location: ../inicio/cierreSesion.php");
			exit();
		}

	?>

	<title>Manejos Time Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Flash Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
	<meta name="keywords"
		content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
	<meta name="author" content="Codedthemes" />

	<link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
	
	<link rel="stylesheet" href="../assets/fonts/fontawesome/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="../assets/plugins/animation/css/animate.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
</head>
<body>
	
	 <div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	
	 <nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
		<div class="navbar-wrapper ">
			<div class="navbar-brand header-logo">
				<a href="dassboard.php" class="b-brand">
					<img src="" alt="" class="logo images">
					<img src="" alt="" class="logo-thumb images">
				</a>
				<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			</div>
			<div class="navbar-content scroll-div">
				<ul class="nav pcoded-inner-navbar">
					<li class="nav-item pcoded-menu-caption">
						<label>Navegando</label>
					</li>

					<?php
					$visualDassboard = '<li class="nav-item"><a href="../complementoDassboard/dassboard.php" 
					class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i>
		    		</span><span class="pcoded-mtext">Inicio</span></a></li>';
					$InformeUsuarios =  '<li class="nav-item pcoded-hasmenu">
					<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Usuarios</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="../informeUsuarios/visualInforUser.php" class="">Informes Usuarios</a></li>
						<li class=""><a href="../informeUsuarios/visualCreacionUser.php" class="">Crear Usuarios</a></li>
					</ul>
					</li>';

					$visualGrupos = '<li class="nav-item"><a href="../grupo/grupoVista.php" class="nav-link"><span 
					class="pcoded-micon"><i class="feather icon-users"></i></span><span 
					class="pcoded-mtext">Grupos</span></a></li>';

					$visualmaterias = '<li class="nav-item"><a href="../materia/materiaVista.php" class="nav-link"><span 
					class="pcoded-micon"><i class="feather icon-book"></i></span><span 
					class="pcoded-mtext">Materias</span></a></li>';

                    $util->validarVista($admin, $visualDassboard);
                    $util->validarVista($admin, $InformeUsuarios);
					$util->validarVista($admin, $visualGrupos);
					$util->validarVista($admin, $visualmaterias);

					$util->validarVista($docentes, $visualDassboard);

					$util->validarVista($monitor, $visualDassboard);

					?>
				</ul>
			</div>
		</div>
	</nav>
	<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto">
				<li>
					<div class="dropdown drp-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon feather icon-settings"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-notification">
							<div class="pro-head">
								<img src="../assets/img/user.png" class="img-radius" alt="User-Profile-Image">
								<span>
								<?php
								   echo nombreUsuario." ".apellidoUsuario;
								?>
								</span>
							</div>
							<ul class="pro-body">
								<li><a href="../cambiarPassword/visualCambiarPass.php" class="dropdown-item"><i class="feather icon-edit"></i> Cambiar contraseña</a></li>
								<li><a href="../inicio/cierreSesion.php" class="dropdown-item"><i class="feather icon-log-in"></i> Cerrar Sesion</a></li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</header>


