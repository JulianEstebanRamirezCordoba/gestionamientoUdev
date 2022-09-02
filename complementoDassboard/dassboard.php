<?php
	require_once "../navegador/menuOrquestador.php";
	include_once "controladorDaasboard.php";

	$controlDass = new controlDass();
	$numeroUdev = $controlDass->conteosUsuariosUdev();
	$numeroCompubuga = $controlDass->conteosUsuariosCompubuga();
	$numeroMoscati = $controlDass->conteosUsuariosMoscati();
	$numeroDesactivos = $controlDass->conteoDesactivos();
	define("TOTALUSUARIOS", $controlDass->TotalUsurios());

	$porsentajes = $controlDass->porsentajeUser(TOTALUSUARIOS, $numeroUdev, $numeroCompubuga, $numeroMoscati, $numeroDesactivos);

?>
	<div class="pcoded-main-container">
		<div class="pcoded-wrapper">
			<div class="pcoded-content">
				<div class="pcoded-inner-content">
					<div class="main-body">
						<div class="page-wrapper">
						<div class="page-header">
								<div class="page-block">
									<div class="row align-items-center">
										<div class="col-md-12">
											<div class="page-header-title">
												<h5>Home</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
												<li class="breadcrumb-item"><a href="#!">Analytics Dashboard</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-3 col-md-6">
									<div class="card prod-p-card bg-c-blue">
										<div class="card-body">
											<div class="row align-items-center m-b-15">
												<div class="col">
													<h6 class="m-b-5 text-white">Usuarios Hibridos UDEV</h6>
													<h3 class="m-b-0 text-white"><?php
													echo $numeroUdev?></h3>
												</div>
												<div class="col-auto">
													<i class="fas fa-address-book text-c-purple f-18" ></i>
												</div>
											</div>
											<p class="m-b-0 text-white"><span class="label label-primary m-r-10"><?php
											echo number_format($porsentajes['porsentajeUdev'], 2); /* @d */ ?> % </span>De Usuarios totales</p>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6">
									<div class="card prod-p-card bg-c-info">
										<div class="card-body">
											<div class="row align-items-center m-b-15">
												<div class="col">
													<h6 class="m-b-5 text-white">Usuarios Familia Compubuga</h6>
													<h3 class="m-b-0 text-white"><?php
													echo $numeroCompubuga?></h3>
												</div>
												<div class="col-auto">
													<i class="fas fa-address-book text-c-info f-18"></i>
												</div>
											</div>
											<p class="m-b-0 text-white"><span class="label label-info m-r-10"><?php
											echo number_format($porsentajes['porsentajeCompubuga'], 2); /* @d */ ?> %</span>De Usuarios Totales</p>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6">
									<div class="card prod-p-card bg-c-green">
										<div class="card-body">
											<div class="row align-items-center m-b-15">
												<div class="col">
													<h6 class="m-b-5 text-white">Usuarios Familia Moscaty</h6>
													<h3 class="m-b-0 text-white"><?php
													echo $numeroMoscati;
													?></h3>
												</div>
												<div class="col-auto">
                                                    <i class="fas fa-address-book text-c-green f-18"></i>
												</div>
											</div>
											<p class="m-b-0 text-white"><span class="label label-success m-r-10"><?php
											echo number_format($porsentajes['porsentjeMoscati'], 2); /* @d */ ?> % </span>De Usuarios totales</p>
				                       	</div>
			                        </div>
                                </div>	
								<div class="col-xl-3 col-md-6">
									<div class="card prod-p-card bg-c-red">
										<div class="card-body">
											<div class="row align-items-center m-b-15">
												<div class="col">
													<h6 class="m-b-5 text-white">Usuarios Desactivos Udev</h6>
													<h3 class="m-b-0 text-white"><?php
													echo $numeroDesactivos;
													?></h3>
												</div>
												<div class="col-auto">
                                                    <i class="fas fa-user-slash text-c-red f-17"></i>
												</div>
											</div>
											<p class="m-b-0 text-white"><span class="label label-danger m-r-10"><?php
											echo number_format($porsentajes['porsentajeDesactivos'], 2); /* @d */?> % </span>De Usuarios totales</p>
				                       	 	</div>
			                        	</div>
									</div>
								</div>
						    </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
    </div>
	<!-- Required Js -->
	<script src="../assets/js/vendor-all.min.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>
</body>
</html>