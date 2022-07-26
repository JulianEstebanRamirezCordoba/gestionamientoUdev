<?php
require_once "../navegador/menuOrquestador.php";
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
                                                <h5 class="m-b-10">Forma Usuarios</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="../complementoDassboard/dassboard.php"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="visualInforUser.php">Informes</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Formulario registro usuario</h5>
                                        </div>
                                        <div class="card-body">
                                            <h5>Ingresar un usuario nuevo</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="controlCreacionUser.php" method="POST">
                                                    <div class="form-group">
                                                            <label>Nombres</label>
                                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="correo">Correo Electronico</label>
                                                            <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" placeholder="correo electronico">
                                                            <small id="emailHelp" class="form-text text-muted">Campo Obligatorio</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Contraseña</label>
                                                            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                                        </div>
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" class="form-check-input" id="cheVal">
                                                            <label class="form-check-label" for="cheVal">Acepto Terminos</label>
                                                        </div>
                                                        <div class="mb-4">
                                                        <button type="submit" name="registrar" id="registrar" class="btn btn-primary">Registrar</button>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Apellidos</label>
                                                            <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Documento Identificacion</label>
                                                            <input type="number" id = "identificacion" name="identificacion" class="form-control" placeholder="Cedula o Tarjeta identidad">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Contacto </label>
                                                            <input type="number" id="numeroCel" name="numeroCel" class="form-control" placeholder="Numero telefonico">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Instituto</label>
                                                            <select class="form-control" id="instituoSelect" name="instituoSelect">
                                                                <option value="0">UDEV</option>
                                                                <option value="1">Compubuga</option>
                                                                <option value="2">Moscati</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Tipo Usuario</label>
                                                            <select class="form-control" id="tipoSelect" name="tipoSelect">
                                                                <option value="0">Administrativo</option>
                                                                <option value="1">Docente</option>
                                                                <option value="2">Monitor</option>
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
        
    </script>
</body>
</html>