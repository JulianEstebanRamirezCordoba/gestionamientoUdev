<?php
session_start();
require_once "../navegador/menuOrquestador.php";

$utilModelo = new utilModelo();

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
                                        <div class="col-md-5">
                                            <div class="page-header-title">
                                                <h5 class="m-b-10">Forma Asignadas</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Formulario Asignar</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="AsignarHorarioControlador.php" method="POST">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Materia</label>
                                                        <select class="form-control" id="tipoMateria" name="tipoMateria">
                                                            <option selected disabled value="">-</option>
                                                            <?php
                                                                $tablaMateria = "materia";
                                                                $extraccion = array("mat_id", "mat_nombre");
                                                                $consulta = $utilModelo->consultaTodosDatos($tablaMateria, $extraccion);
                                                                while($inforMat = $consulta->fetch_assoc()){ 
                                                                    echo "<option value = ".$inforMat['mat_id'].">".$inforMat['mat_id']." - ".$inforMat['mat_nombre']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Horario</label>
                                                        <select class="form-control" id="tipoHorario" name="tipoHorario">
                                                            <option selected disabled value="">-</option>
                                                            <?php
                                                                $tablaHorario = "horario";
                                                                $extraccion = array("hor_id", "hor_dia_asignado", "hor_diaHoraEntrada", "hor_diaHoraSalida");
                                                                $consulta = $utilModelo->consultaTodosDatos($tablaHorario, $extraccion);
                                                                while($inforHor = $consulta->fetch_assoc()){ 
                                                                    echo "<option value = ".$inforHor['hor_id'].">".$inforHor['hor_dia_asignado']." - ".$inforHor['hor_diaHoraEntrada']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                        <div class="mb-4">
                                                        <button type="submit" name="guardado" id="guardado" onclick="validarCampos()" class="btn btn-primary">Asignar</button>
                                                        </div>
                                                        <?php
      				                                        if(isset($_SESSION['Ok_insert'])) {
  				                                        ?>
  				                                        <div class="form-group">
      				                                        <div class="row">
    	  				                                        <div class="col-lg-6">
              				                                        <div class="text-center">
                      				                                        <div class="ale
                                                                            srt alert-success" role="alert">
                        		                                        <?php
						   			                                        echo $_SESSION['Ok_insert'];
						  		                                        ?>
                      				                                        </div>
                  				                                        </div>
              				                                        </div>
          				                                        </div>
      				                                        </div>
  				                                        <?php
      					                                        unset($_SESSION['Ok_insert']);
      				                                        }else if(isset($_SESSION['Error_insert'])){

  				                                        ?>
  				                                            <div class="form-group">
      				                                            <div class="row">
    	  				                                            <div class="col-lg-12">
              				                                            <div class="text-center">
                      				                                            <div class="alert alert-warning" role="alert">
                        		                                            <?php
						   			                                            echo $_SESSION['Error_insert'];
						  		                                            ?>
                      				                                            </div>
                  				                                            </div>
              				                                            </div>
          				                                            </div>
      				                                            </div>
  				                                        <?php
      					                                    unset($_SESSION['Error_insert']);
      				                                        }

  				                                        ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Salas</label>
                                                        <select class="form-control" id="tipoSala" name="tipoSala">
                                                            <option selected disabled value="">-</option>
                                                            <?php
                                                                $tablaSala = "sala";
                                                                $extraccion = array("sal_id", "sal_nombre", "sal_capacidadMaxima");
                                                                $consulta = $utilModelo->consultaTodosDatos($tablaSala, $extraccion);
                                                                while($inforSal = $consulta->fetch_assoc()){ 
                                                                    echo "<option value = ".$inforSal['sal_id'].">".$inforSal['sal_id']." - ".$inforSal['sal_nombre']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Docente</label>
                                                        <select class="form-control" id="tipoDocente" name="tipoDocente">
                                                            <option selected disabled value="">-</option>
                                                            <?php
                                                                $tablaSala = "usuario";
                                                                $extraccion = array("usu_id", "usu_nombre", "usu_identificacion");
                                                                $campoCondicion = "tipo_usuario";
                                                                $valorCondicion = 1;
                                                                $consulta = $utilModelo->consultaTodosDatos($tablaSala, $extraccion, $campoCondicion, $valorCondicion);
                                                                while($inforUsu = $consulta->fetch_assoc()){ 
                                                                    echo "<option value = ".$inforUsu['usu_id'].">".$inforUsu['usu_identificacion']." - ".$inforUsu['usu_nombre']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Grupo</label>
                                                        <select class="form-control" id="tipoGru" name="tipoGru">
                                                            <option selected disabled value="">-</option>
                                                            <?php
                                                                $tablaGrupo = "grupo";
                                                                $extraccion = array("gru_id", "gru_nombre", "gru_codigo");
                                                                $consulta = $utilModelo->consultaTodosDatos($tablaGrupo, $extraccion);
                                                                while($inforGru = $consulta->fetch_assoc()){ 
                                                                    echo "<option value = ".$inforGru['gru_id'].">".$inforGru['gru_codigo']." - ".$inforGru['gru_nombre']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    </form>
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
    </div>
    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>

    <script>
        function validarCampos(){


        }
    </script>

</body>
</html>