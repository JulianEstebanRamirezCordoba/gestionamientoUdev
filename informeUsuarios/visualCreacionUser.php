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
                                        <div class="col-md-5">
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
                                            <h5>Inscribir Cuenta Nueva</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="controlCreacionUser.php" method="POST">
                                                    <div class="form-group">
                                                            <label>Nombres</label>
                                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="correo">Correo Electronico</label>
                                                            <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" placeholder="correo electronico" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Contraseña</label>
                                                            <input type="password" class="form-control" id="password" name="password" minlength="6" maxlength="20" placeholder="Contraseña" required>
                                                        </div>
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" class="form-check-input" id="cheVal" required>
                                                            <label class="form-check-label" for="cheVal">Acepto Terminos</label>
                                                        </div>
                                                        <div class="mb-4">
                                                        <button type="submit" name="registrar" id="registrar" onclick="validarCampos()" class="btn btn-primary">Registrar</button>
                                                        </div>
                                                        <?php
      				                                        if(isset($_SESSION['enviadoBien'])) {
  				                                        ?>
  				                                        <div class="form-group">
      				                                        <div class="row">
    	  				                                        <div class="col-lg-6">
              				                                        <div class="text-center">
                      				                                        <div class="alert alert-success" role="alert">
                        		                                        <?php
						   			                                        echo $_SESSION['enviadoBien'];
						  		                                        ?>
                      				                                        </div>
                  				                                        </div>
              				                                        </div>
          				                                        </div>
      				                                        </div>
  				                                        <?php
      					                                        unset($_SESSION['enviadoBien']);
      				                                        }else if(isset($_SESSION['enviadoIncorrecto'])){

  				                                        ?>
  				                                            <div class="form-group">
      				                                            <div class="row">
    	  				                                            <div class="col-lg-12">
              				                                            <div class="text-center">
                      				                                            <div class="alert alert-warning" role="alert">
                        		                                            <?php
						   			                                            echo $_SESSION['enviadoIncorrecto'];
						  		                                            ?>
                      				                                            </div>
                  				                                            </div>
              				                                            </div>
          				                                            </div>
      				                                            </div>
  				                                        <?php
      					                                    unset($_SESSION['enviadoIncorrecto']);
      				                                        }

  				                                        ?>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Apellidos</label>
                                                            <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Documento Identificacion</label>
                                                            <input type="number" id = "identificacion" name="identificacion" class="form-control" placeholder="Cedula o Tarjeta identidad" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Contacto </label>
                                                            <input type="number" id="numeroCel" name="numeroCel" class="form-control" placeholder="Numero telefonico" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Instituto</label>
                                                            <select class="form-control" id="instituoSelect" name="instituoSelect">
                                                            <option value="">Seleccione</option>
                                                                <option value="0">Udev</option>
                                                                <option value="1">Compubuga</option>
                                                                <option value="2">Moscati</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Tipo Usuario</label>
                                                            <select class="form-control" id="tipoSelect" name="tipoSelect">
                                                                <option value="">Seleccione</option>
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
    function validarCampos(){
        let instituto = document.getElementById("instituoSelect").value;
        let tipo = document.getElementById("tipoSelect").value;
        let contra = document.getElementById("password").value;
            
        if(contra.length <= 6){
            Swal.fire({
                icon: 'alert',
                title: 'contraseña muy insegura',
                text: 'La contraseña es demaciado corta porfavor ingrese una mas segura',
                footer: '<a href="../inicio/manual/index.html">Si tienes dudas en el manejo vea al Manual</a>'
            })
        }
        
        if(tipo == "" || instituto == ""){
            Swal.fire({
                icon: 'alert',
                title: 'Se tiene que seleccionar',
                text: 'Seleccione un tipo o un instituto ya que estan vacios',
                footer: '<a href="../inicio/manual/index.html">Si tienes dudas en el manejo vea al Manual</a>'
            })
        }
        }
    </script>
</body>
</html>