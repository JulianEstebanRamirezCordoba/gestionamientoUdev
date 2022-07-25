<?php
    @session_start();
	include_once "../navegador/menuOrquestador.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>GRUPOS</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Flash Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
    <meta name="author" content="Codedthemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="../assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="../assets/plugins/animation/css/animate.min.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
   
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
            <a href="index.html" class="b-brand">
                <img src="../assets/images/logo.svg" alt="" class="logo images">
                <img src="../assets/images/logo-icon.svg" alt="" class="logo-thumb images">
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="#!">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <a href="#!" class="mob-toggler"></a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <div class="main-search open">
                        <div class="input-group">
                            <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                            <a href="#!" class="input-group-append search-close">
                                <i class="feather icon-x input-group-text"></i>
                            </a>
                            <span class="input-group-append search-btn btn btn-primary">
                                <i class="feather icon-search input-group-text"></i>
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-right">
                                    <a href="#!" class="m-r-10">mark as read</a>
                                    <a href="#!">clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="../assets/images/user/avatar-3.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="../assets/images/user/avatar-3.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>1 hour</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>2 hour</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="#!">show all</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="../assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                                <span>John Doe</span>
                                <a href="auth-signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="#!" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
                                <li><a href="#!" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <li><a href="message.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                                <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
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
                                                <h3 class="m-b-10">GRUPOS</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-users"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Creación de grupos</a></li>
                                                <li class="breadcrumb-item"><a href="#!">Edición de grupos</a></li>
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
                                            AÑADIR NUEVO GRUPO                                  
                                          </button>

                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-triped" border = "2">
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
<!-- Cierre modal -->
<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
<!-- Boton envio datos -->
<button type="submit" name="guardarGrupo" id="guardarGrupo"class="btn btn-primary">Guardar</button>
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
<!-- Fin Modal Editar -->

<!-- Inicio Modal Eliminar -->
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
