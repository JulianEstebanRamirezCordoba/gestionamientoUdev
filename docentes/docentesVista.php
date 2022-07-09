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
                                            <H1>DOCENTES</H1>
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
                                            AÑADIR DOCENTE                                  
                                        </button>
    
                                    <table class="table table-bordered table-dark" border = "2">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID DOCENTE</th>
                                                <th scope="col">NOMBRE DE DOCENTE</th>
                                                <th scope="col">APELLIDO</th>
                                                <th scope="col">IDENTIFICACION</th>
                                                <th scope="col">NUMERO TELEFONICO</th>
                                                <th scope="col">E-MAIL</th>
                                                <th scope="col">PASSWORD</th>
                                                <th scope="col">INSTITUCION</th>
                                                <th scope="col">ESTADO</th>

                                                <th class="td-actions">EDITAR/ELIMINAR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tbody>

                                        <?php

                                        $utilModelo = new utilModelo();
                                        $tabla = "usuario";
                                        $result = $utilModelo->consultarVariasTablas("*",$tabla,"1");
                                        while ($fila = mysqli_fetch_array($result)) {
                                            if ($fila != NULL) {

                                                $datos=
                                                    $fila[0]."||".
                                                    $fila[1]."||".
                                                    $fila[2]."||".
                                                    $fila[3]."||".
                                                    $fila[4]."||".
                                                    $fila[5]."||".
                                                    $fila[6]."||".
                                                    $fila[7]."||".

                                                    $estado = "";

                                                if($fila[7] == 1){

                                                    $estado = "Activo";

                                                }
                                                else{

                                                    $estado = "Inactivo";

                                                }

                                                echo "
                                                <tr>
                                                    <td> $fila[0] </td>
                                                    <td> $fila[1] </td>
                                                    <td> $fila[2] </td>
                                                    <td> $fila[3] </td>
                                                    <td> $fila[4] </td>
                                                    <td> $fila[5] </td>
                                                    <td> $fila[6] </td>
                                                    <td> $estado </td>    
                                                    <td class=\"td-actions\"><a  data-toggle=\"modal\" href=\"#modalEditar\" onclick=\"agregarForm('$datos');\" class=\"btn btn-small btn-info\"><i class=\"bi bi-pencil-square\"></i></a><a href=\"#modalEliminar\"  onclick=\"agregarForm('$datos');\" data-toggle=\"modal\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a></td>
                                                </tr>";

            

                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>


<!-- Modal Guardar -->
<div class="modal fade" id="modalGuardar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AÑADIR DOCENTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="span8" action="docentesControlador.php" method="post" >


      <div class="form-group   ">
                                    <input   type="text" name="nombre_doncente" id="nombre_docente" tabindex="1" class=" form-control span4"
                                           placeholder="Nombre" value="" required>
                                </div>
                                <div class="form-group ">
                                    <input   type="text" name="apellido_docente" id="apellido_docente" tabindex="1" class=" form-control span4"
                                           placeholder="Apellido" value="" required>
                                </div>
                                
                                  
                                  <div class="form-group   ">
                                    <input   type="text" name="identificacion" id="identificacion" tabindex="1" class=" form-control span4"
                                           placeholder="Identificacion" value="" required>
                                </div>
                                <div class="form-group ">
                                    <input   type="text" name="telefono" id="telefono" tabindex="1" class=" form-control span4"
                                           placeholder="Telefono" value="" required>
                                </div>
                                
                                  
                                  <div class="form-group   ">
                                    <input   type="text" name="email" id="email" tabindex="1" class=" form-control span4"
                                           placeholder="Email" value="" required>
                                </div>
                                <div class="form-group ">
                                    <input   type="text" name="password" id="password" tabindex="1" class=" form-control span4"
                                           placeholder="Password" value="" required>
                                </div>
                                <div class="form-group ">
                                    <input   type="numer" name="tipo_usuario" id="tipo_usuario" tabindex="1" class=" form-control span4"
                                           placeholder="Tipo de usuario" value="" required>
                                </div>

</div>
<div class="modal-footer">
<!-- Cierre modal -->
<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
<!-- Boton envio datos -->
<button type="submit" name="guardarUsuario" id="guardarUsuario"class="btn btn-primary">Guardar</button>
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
        <h5 class="modal-title" id="exampleModalLabel">EDITAR REGISTROS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="span8" action="docentesControlador.php" method="post" >


      <div class="form-group">
                                  <input id="codigoE" name="id" type="hidden">
                                  </div>
                                  <div class="form-group   ">
                                    <input   type="text" name="nombre_doncente" id="nombre_docente" tabindex="1" class=" form-control span4"
                                           placeholder="Nombre" value="" required>
                                </div>
                                <div class="form-group ">
                                    <input   type="text" name="apellido_docente" id="apellido_docente" tabindex="1" class=" form-control span4"
                                           placeholder="Apellido" value="" required>
                                </div>
                                
                                  
                                  <div class="form-group   ">
                                    <input   type="text" name="identificacion" id="identificacion" tabindex="1" class=" form-control span4"
                                           placeholder="Identificacion" value="" required>
                                </div>
                                <div class="form-group ">
                                    <input   type="text" name="telefono" id="telefono" tabindex="1" class=" form-control span4"
                                           placeholder="Telefono" value="" required>
                                </div>
                                
                                  
                                  <div class="form-group   ">
                                    <input   type="text" name="email" id="email" tabindex="1" class=" form-control span4"
                                           placeholder="Email" value="" required>
                                </div>
                                <div class="form-group ">
                                    <input   type="text" name="password" id="password" tabindex="1" class=" form-control span4"
                                           placeholder="Password" value="" required>
                                </div>
                                <div class="form-group ">
                                    <input   type="numer" name="tipo_usuario" id="tipo_usuario" tabindex="1" class=" form-control span4"
                                           placeholder="Tipo de usuario" value="" required>
                                </div>
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="modificarCarrera" id="modificarCarrera"class="btn btn-primary">Modificar</button>
  </div>

  </form>
</div>
<!-- Ventana modal para eliminar -->
<div class="modal fade" id="deleteChildresn " tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                ¿Realmente deseas eliminar a ?
            </h4>
        </div>

        <div class="modal-body">
          <strong style="text-align: center !important"> 
            <?php echo $nombre_docente['nombre_docente']; ?>
        
          </strong>
        </div>
        
        <div class="modal-footer">
          <button type="button
                                          }" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger btnBorrar" data-dismiss="modal" id="<?php echo $usu_id['usu_id']; ?>">Borrar</button>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->


                                        
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
       $("#nombre_docente").val(d[1]);
       $("#apellido_docente").val(d[2]);
       $("#identificacion").val(d[3]);
       $("#telefono").val(d[4]);
       $("#email").val(d[5]);
       $("#password").val(d[6]);
       $("#tipo_usuario").val(d[7]);
       
    }

  </script>

</body>
</html>