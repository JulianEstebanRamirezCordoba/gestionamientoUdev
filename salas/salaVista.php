<?php
    @session_start();
	include_once "../navegador/menuOrquestador.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>SALAS</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    

    <!-- Favicon icon -->
   

</head>
    </header>
    <!-- [ Header ] end -->
    <!-- [ Main Content ] start -->
    <section class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ breadcrumb ] start -->
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="page-header-title">
                                                <h5 class="m-b-10">Bootstrap Basic Tables</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Bootstrap Table</a></li>
                                                <li class="breadcrumb-item"><a href="#!">Basic Tables</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">
                               
                                <!-- [ dark-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                          <!-- Button trigger modal -->
                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGuardar">
                                            AÑADIR NUEVA SALA                                  
                                          </button>

                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-white" border = "2">
                                                    <thead>
                                                        <tr>
                                                          <th scope="col">IDENTIFICADOR SALA</th>
                                                          <th scope="col">NOMBRE DE LA SALA</th>
                                                          <th scope="col">CAPACIDAD MAXIMA DE LA SALA</th>
                                                          <th scope="col">NOMBRE DE LA INSTITUCION</th>
                                                          <th scope="col">ESTADO</th>
                                                          <th class="td-actions">EDITAR/ELIMINAR</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        include_once "../util/utilModelo.php";
                                                          $utilModelo = new utilModelo();
                                                            $tabla = "sala";
                                                            $result = $utilModelo->subConsultas($tabla,"*","1");
                                                            while($fila = mysqli_fetch_array($result)) {
                                                                if ($fila != NULL) {

                                                                    $datos=
                                                                        $fila[0]."||".
                                                                        $fila[1]."||".
                                                                        $fila[2]."||".
                                                                        $institucion="";
                                                                        $estado = "";
                                                                if($fila[3] == 1){

                                                                        $institucion = "Moscati";
    
                                                                    }
                                                                    else{
    
                                                                        $institucion = "Compubuga";
    
                                                                        }

                                                                    if($fila[4] == 1){

                                                                        $estado = "Activo";

                                                                    }
                                                                    else{

                                                                        $estado = "Inactivo";

                                                                    }

                                                                  echo "
                                                                  <tr>
                                                                      <td> $fila[0] </td>
                                                                      <td> $fila[1] </td>
                                                                      <td> $fila[3] </td>
                                                                      <td> $institucion </td>
                                                                      <td> $estado </td>    
                                                                      <td class=\"td-actions\"><a  data-toggle=\"modal\" href=\"#modalEditar\" onclick=\"agregarForm('$datos');
                                                                      \" class=\"btn btn-info\"><i class=\"feather icon-edit \"></i></a>
                                                                      <a href=\"#modalDelete\" onclick=\"agregarForm('$datos');
                                                                      \" data-toggle=\"modal\"class=\"btn btn-danger btn-small\"><i class=\"feather icon-trash\"> </i></a></td>
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
                                <!-- [ dark-table ] end -->
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ Main Content ] end -->

    <!-- Inicio Modal Guardar -->
<div class="modal fade" id="modalGuardar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AÑADIR NUEVA SALA >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="span8" action="salaControlador.php" method="post" >


                        <div class="form-group  ">
                            <input   type="text" name="sal_nombre" id="nombre" tabindex="1" class=" form-control span4"
                                    placeholder="Nombre de la sala" value="" required>
                        </div>
                        <div class="form-group  ">
                            <input   type="text" name="sal_capacidadMaxima" id="codigo" tabindex="1" class=" form-control span4"
                                    placeholder="Capacidad maxima de la sala" value="" required>
                        
                                    </div>
</div>
<div class="modal-footer">
<!-- Cierre modal -->
<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
<!-- Boton envio datos -->
<button type="submit" name="guardarCarrera" id="guardarCarrera"class="btn btn-primary">Guardar</button>
</div>

</form>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal Guardar -->

<!-- Inicio Modal Editar -->
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
      <form class="span8" action="salaControlador.php" method="post" >


      <div class="form-group">
                                  <input id="codigoE" name="id" type="hidden">
                                  </div>
                              <div class="form-group   ">
                                <label for="Name">Nombre de la sala:</label>
                                    <input   type="text" name="sal_nombre" id="sal_nombre" tabindex="1" class=" form-control span4"
                                           placeholder="Nombre de la sala" value="" required>
                                </div>
                                <label for="Name">Capacidad maxima de la sala:</label>
                                <div class="form-group   ">
                                    <input   type="text" name="sal_capacidadMaxima" id="sal_capacidadMaxima" tabindex="1" class=" form-control span4"
                                           placeholder="Capacidad maxima de la sala" value="" required>
                                </div>
                                
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="modificarSala" id="modificarSala"class="btn btn-primary">Modificar</button>
  </div>

  </form>
</div>
<!-- Fin Modal Editar -->

<!-- Inicio Modal Editar -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR REGISTROS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="span8" action="salaControlador.php" method="post" >


      <div class="form-group">
                                  <input id="codigoE" name="id" type="hidden">
                                  </div>
                              <div class="form-group   ">
                                <label for="Name">Nombre de la sala:</label>
                                    <input   type="text" name="sal_nombre" id="sal_nombre" tabindex="1" class=" form-control span4"
                                           placeholder="Nombre de la sala" value="" required>
                                </div>
                                <label for="Name">Capacidad maxima de la sala:</label>
                                <div class="form-group   ">
                                    <input   type="text" name="sal_capacidadMaxima	" id="sal_capacidadMaxima" tabindex="1" class=" form-control span4"
                                           placeholder="Capacidad maxima de la sala" value="" required>
                                </div>
                               
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="modificarSala" id="modificarSala"class="btn btn-primary">Modificar</button>
  </div>

  </form>
</div>

    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="../assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="../assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="../assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="../assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="../assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
	<!-- Required Js -->
	<script src="../assets/js/vendor-all.min.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>

    <script type="text/javascript">

    function agregarForm(datos){
      d=datos.split("||");

       $("#codigoE").val(d[0]);
       $("#idEliminar").val(d[0]);
       $("#sal_nombre").val(d[1]);
       $("#sal_capacidadMaxima").val(d[2]);
    }

  </script>

</body>

</html>
