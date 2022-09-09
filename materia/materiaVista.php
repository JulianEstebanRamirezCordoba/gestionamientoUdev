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
                                                <h3 class="m-b-10">MATERIAS</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-book"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Creación de materias</a></li>
                                                <li class="breadcrumb-item"><a href="#!">Edición de materias</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card"><br>
                                      <div class='col-md-6'>
                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGuardar">
                                            AÑADIR NUEVA MATERIA                                  
                                          </button>
                                      </div>
                                          

                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                          <th scope="col">IDENTIFICADOR MATERIA</th>
                                                          <th scope="col">NOMBRE DE MATERIA</th>                                                                                                                 
                                                          <th scope="col">ESTADO</th>
                                                          <th class="td-actions">EDITAR/ELIMINAR</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        
                                                          $utilModelo = new utilModelo();
                                                            $tabla = "materia";
                                                            $result = $utilModelo->subConsultas($tabla,"*","1");
                                                            while ($fila = mysqli_fetch_array($result)) {
                                                                if ($fila != NULL) {

                                                                    $datos=
                                                                        $fila[0]."||".
                                                                        $fila[1]."||".
                                                                        $fila[2]."||".
                                                                       

                                                                        $estado = "";

                                                                    if($fila[2] == 1){

                                                                        $estado = "Activo";

                                                                    }
                                                                    else{

                                                                        $estado = "Inactivo";

                                                                    }

                                                                  echo "
                                                                  <tr>
                                                                      <td> $fila[0] </td>
                                                                      <td> $fila[1] </td>                                                                     
                                                                      <td> $estado </td>    
                                                                      <td class=\"td-actions\"><a  data-toggle=\"modal\" href=\"#modalEditar\" onclick=\"agregarForm('$datos');
                                                                      \" class=\"btn btn-small btn-info\"><i class=\"feather icon-edit\"></i></a>
                                                                      <a href=\"#modalEliminar\" onclick=\"agregarForm('$datos');
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
        <h5 class="modal-title" id="exampleModalLabel">A�ADIR NUEVA MATERIA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="span8" action="materiaControlador.php" method="post" >
                        <div class="form-group  ">
                            <input   type="text" name="nombre_materia" id="nombre" tabindex="1" class=" form-control span4"
                                    placeholder="Nombre de la materia" value="" required>
                        </div>                       
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
<button type="submit" name="guardarMateria" id="guardarMateria"class="btn btn-primary">Guardar</button>
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
        <h5 class="modal-title" id="exampleModalLabel">EDITAR MATERIA</h5>
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
                                <label for="Name">Nombre de la materia:</label>
                                    <input   type="text" name="nombre_materia" id="nombre_materia" tabindex="1" class=" form-control span4"
                                           placeholder="Nombre de la materia" value="" required>
                               
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="modificarMateria" id="modificarMateria"class="btn btn-primary">Modificar</button>
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
      <form class="span8" action="materiaControlador.php" method="post" >

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
    <button type="submit" name="eliminarMateria" id="eliminarMateria"class="btn btn-primary">Modificar</button>
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
       $("#nombre_materia").val(d[1]);  
       $("#modificarEstado").val(d[2]);
    }

  </script>

</body>

</html>
