<?php
    @session_start();
	include_once "../navegador/menuOrquestador.php";
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
										<div class="col-md-13">
											<div class="page-header-title">
                                            <ul class="breadcrumb">
                                            <H1>MATERIA</H1>
                                            </ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						<div id="center">
							<div class="row">
								<div class="col-xl-12 col-md-12">
									<!-- Al parecer aquí se puede iniciar la intefaz -->
                                    <!-- Empieza código html para la interfaz -->
                                    <!DOCTYPE html>
                                    <html lang="en">
                                    <head>
                                        <meta charset="UTF-8">
                                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                        <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                                        <link href="../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
                                        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
                                        rel="stylesheet">
                                        <link href="../assets/bootstrap/css/font-awesome.css" rel="stylesheet">
                                        <link href="../assets/bootstrap/css/style.css" rel="stylesheet">
                                        <link href="../assets/bootstrap/css/pages/dashboard.css" rel="stylesheet">
                                        <link href="../assets/bootstrap/css/pages/plans.css" rel="stylesheet">
                                    </head>
                                    <body>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGuardar">
                                            AÑADIR NUEVA MATERIA                                  
                                        </button>

                                  <!-- [ dark-table ] start -->
                                <div class="col-md-6">
                              
                                        <div class="card-body table-border-style">
                                            
                                                <table class="table table-dark">
                                                    <thead>
                                                    <tr>
                                                <th scope="col">IDENTIFICADOR DE LA MATERIA</th>
                                                <th scope="col">NOMBRE DE LA MATERIA</th>                                              
                                                <th class="td-actions">EDITAR/ELIMINAR</th>
                                            </tr>
                                            </thead>
                                        <tbody>
                                        <tbody>

                                        <?php

                                        $utilModelo = new utilModelo();
                                        $tabla = "materia";
                                        $result = $utilModelo->consultarVariasTablas("*",$tabla,"1");
                                        while ($fila = mysqli_fetch_array($result)) {
                                            if ($fila != NULL) {

                                                $datos=
                                                    $fila[0]."||".
                                                    $fila[1]."||";
                                            }
                                               echo "
                                                <tr>
                                                    <td> $fila[0] </td>
                                                    <td> $fila[1] </td>                                                     
                                                    <td class=\"td-actions\"><a  data-toggle=\"modal\" href=\"#modalEditar\" onclick=\"agregarForm('$datos');\" class=\"btn btn-small btn-info\"><i class=\"bi bi-pencil-square\"></i></a><a href=\"#modalEliminar\"  onclick=\"agregarForm('$datos');\" data-toggle=\"modal\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a></td>
                                                </tr>";

            

                                                }
                                            
                                            ?>
                                        </tbody>
                                                </table>
                                          
                                <!-- [ dark-table ] end -->


<!-- Modal Guardar -->
<div class="modal fade" id="modalGuardar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AÑADIR NUEVA MATERIA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="span8" action="materiaControlador.php" method="post" >


                        <div class="form-group  ">
                            <input   type="text" name="nombre_materia" id="nombre_materia" tabindex="1" class=" form-control span4"
                                    placeholder="Nombre de la materia" value="" required>
                        </div>
                        

</div>
<div class="modal-footer">
<!-- Cierre modal -->
<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
<!-- Boton envio datos -->
<button type="submit" name="guardarMateria" id="guardarMateria"class="btn btn-primary">Guardar</button>
</div>

</form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR REGISTROS DE MATERIA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="span8" action="materiaControlador.php" method="post" >


      <div class="form-group">
                                  <input id="codigoE" name="id" type="hidden">
                                  </div>
                                  <div class="form-group   ">
                                    <input   type="text" name="nombre_carrera" id="nombre_materia" tabindex="1" class=" form-control span4"
                                           placeholder="Nombre de la carrera" value="" required>
                                </div>
                               
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="modificarMateria" id="modificarMateria"class="btn btn-primary">Modificar</button>
  </div>

  </form>
</div>
<!-- Fin modal editar -->


<!-- inicio modal eliminar -->
<div id="modalEliminar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Eliminar Materia</h3>
  </div>
  <div class="modal-body">

      <form action="materiaControlador.php" method="post" >

                                  <input id="idEliminar" name="idEliminar" type="hidden">
                                  <h3>¿Seguro desea desactivar la materia?</h3>
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="eliminar" id="eliminar"class="btn btn-primary">Desactivar</button>
  </div>

  </form>
</div>
<!-- Fin modal -->


                                        
                                    </body>
                                    </html>
                                    <!-- Termina código html para la intefaz -->
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

    <script type="text/javascript">

    function agregarForm(datos){
      d=datos.split("||");

       $("#codigoE").val(d[0]);
       $("#idEliminar").val(d[0]);
       $("#nombre_carrera").val(d[1]);,
      
    }

  </script>

</body>
</html>