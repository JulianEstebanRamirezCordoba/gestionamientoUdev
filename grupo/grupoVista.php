<?php
    @session_start();
	include_once "../navegador/menuOrquestador.php";
?>
    <section class="pcoded-main-container">
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
                                                <h3 class="m-b-10">GRUPOS</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="../complementoDassboard.php"><i class=""></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGuardar">
                                            AÑADIR NUEVO GRUPO                                  
                                          </button>

                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                          <th scope="col">IDENTIFICADOR GRUPO</th>
                                                          <th scope="col">NOMBRE DEL GRUPO</th>
                                                          <th scope="col">CÓDIGO DEL GRUPO</th>
                                                          <th scope="col">CICLO</th>
                                                          <th scope="col">CANTIDAD DE ESTUDIANTES</th>
                                                          <th scope="col">ESTADO</th>
                                                          <th class="td-actions">EDITAR/ELIMINAR</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        
                                                          $utilModelo = new utilModelo();
                                                            $tabla = "grupo";
                                                            $result = $utilModelo->subConsultas($tabla,"*","1");
                                                            while ($fila = mysqli_fetch_array($result)) {
                                                                if ($fila != NULL) {

                                                                    $datos=
                                                                        $fila[0]."||".
                                                                        $fila[1]."||".
                                                                        $fila[2]."||".
                                                                        $fila[3]."||".
                                                                        $fila[4]."||".
                                                                        $fila[5]."||".

                                                                        $estado = "";

                                                                    if($fila[5] == 1){

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
                                                                      <td> $estado </td>    
                                                                      <td class=\"td-actions\"><a  data-toggle=\"modal\" href=\"#modalEditar\" style=\"width: 55px\" style=\"height: 40px\" onclick=\"agregarForm('$datos');
                                                                      \" class=\"btn btn-info\"><i class=\"feather icon-edit\"></i></a>
                                                                      <a href=\"#modalEliminar\" style=\"width: 55px\" style=\"height: 40px\" onclick=\"agregarForm('$datos');
                                                                      \" data-toggle=\"modal\" class=\"btn btn-danger btn-small\"><i class=\"feather icon-trash\"> </i></a></td>
                                                                  </tr>";

            

                                                                  }
                                                              }
                                                          ?>               
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="modal fade" id="modalGuardar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AÑADIR NUEV0 GRUPO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="span8" action="grupoControlador.php" method="post" >


                        <div class="form-group  ">
                            <input   type="text" name="nombre_grupo" id="nombre" tabindex="1" class=" form-control span4"
                                    placeholder="Nombre del grupo" value="" required>
                        </div>
                        <div class="form-group  ">
                            <input   type="text" name="codigo_grupo" id="codigo" tabindex="1" class=" form-control span4"
                                    placeholder="Código del grupo" value="" required>
                        </div>
                        <div class="form-group  ">
                            <input   type="text" name="ciclo_grupo" id="ciclo" tabindex="1" class=" form-control span4"
                                    placeholder="Ciclo del grupo" value="" required>
                        </div>
                        <div class="form-group  ">
                            <input   type="number" name="cantidadEstudiantes_grupo" id="cantidadEstudiantes" tabindex="1" class=" form-control span4"
                                    placeholder="Cantidad de estudiantes del grupo" value="" required>
                        </div>

</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
<button type="submit" name="guardarGrupo" id="guardarGrupo"class="btn btn-primary">Guardar</button>
</div>

</form>
      </div>
    </div>
  </div>
</div>
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
      <form class="span8" action="grupoControlador.php" method="post" >


      <div class="form-group">
                                  <input id="codigoE" name="id" type="hidden">
                                  </div>
                              <div class="form-group   ">
                                <label for="Name">Nombre de la carrera:</label>
                                    <input   type="text" name="nombre_grupo" id="nombre_grupo" tabindex="1" class=" form-control span4"
                                           placeholder="Nombre de la carrera" value="" required>
                                </div>
                                <label for="Name">Código de la carrera:</label>
                                <div class="form-group   ">
                                    <input   type="text" name="codigo_grupo" id="codigo_grupo" tabindex="1" class=" form-control span4"
                                           placeholder="Código de la carrera" value="" required>
                                </div>
                                <label for="Name">Ciclo del grupo</label>
                                <div class="form-group ">
                                    <input   type="text" name="ciclo_grupo" id="ciclo_grupo" tabindex="1" class=" form-control span4"
                                           placeholder="Ciclo de la carrera" value="" required>
                                </div>
                                <label for="Name">Cantidad estudiantes del grupo:</label>
                                <div class="form-group   ">
                                    <input   type="text" name="cantidadEstudiantes_grupo" id="cantidadEstudiantes_grupo" tabindex="1" class=" form-control span4"
                                           placeholder="Cantidad estudiantes de la carrera" value="" required>
                              </div>
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="modificarGrupo" id="modificarGrupo"class="btn btn-primary">Modificar</button>
  </div>

  </form>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTIVAR/DESACTIVAR REGISTROS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="span8" action="grupoControlador.php" method="post" >


      <div class="form-group">
                                <div>
                                <input id="idEliminar" name="idEliminar" type="hidden">
                                </div>
                                <div>
                                <input id="modificarEstado" name="modificarEstado" type="hidden">
                                </div>
                                <H4>¿SEGUR@ QUE DESEA MODIFICAR EL ESTADO DEL GRUPO?</H4>
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="eliminarGrupo" id="eliminarGrupo"class="btn btn-primary">Modificar</button>
  </div>

  </form>
        </div>
    </div>
  </div>
</div>

    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>

    <script type="text/javascript">

    function agregarForm(datos){
    d=datos.split("||");

    $("#codigoE").val(d[0]);
    $("#idEliminar").val(d[0]);
    $("#nombre_grupo").val(d[1]);
    $("#codigo_grupo").val(d[2]);
    $("#ciclo_grupo").val(d[3]);
    $("#cantidadEstudiantes_grupo").val(d[4]);
    $("#modificarEstado").val(d[5]);
    }

  </script>

</body>

</html>
