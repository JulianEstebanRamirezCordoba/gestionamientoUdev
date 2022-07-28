<?php
require_once "../navegador/menuOrquestador.php";
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
                                        <div class="col-md-8">
                                            <div class="page-header-title">
                                                <h4 class="m-b-6">Informes Usuarios</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="row">Sistema Gestion Udevo</h6>
                                            <form action="controlInforUser.php" method="post">
                                                <div class="col-md-5">
                                                    <input class="form-control" id = "buscar" name = "buscar" type="text" placeholder="Buscar. . .">
                                                </div>
                                            </form>

                                        </div>
                                        <div class="main-search open">
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Codigo Usuario</th>
                                                            <th>Nombre</th>
                                                            <th>Apellido</th>
                                                            <th>Correo</th>
                                                            <th>Cedula</th>
                                                            <th>Contacto</th>
                                                            <th>Instuticion</th>
                                                            <th>Tipo Usuario</th>
                                                            <th>Estado Usuario</th>
                                                            <th>Editado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabla">
                                                        
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
        </div>
    </section>
        <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar Informacion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6"> 
                                <form action="controlCreacionUser.php" method="POST">
                                <div class="form-group">
                                    <label>Nombres</label>
                                        <input type="text" class="form-control" id="actualizarNombre" name="actualizarNombre" placeholder="Nombre completo" required>
                                </div>
                                <div class="form-group">
                                    <label for="correo">Correo Electronico</label>
                                        <input type="email" class="form-control" id="actualizarCorreo" name="actualizarCorreo" aria-describedby="emailHelp" placeholder="correo electronico" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Estado Usuario</label>
                                        <select class="form-control" id="actualizarEstado" name="actualizarEstado">
                                            <option value="1">Activo</option>
                                            <option value="0">Desactivo</option>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tipo Usuario</label>
                                        <select class="form-control" id="actualizarTipo" name="actualizarTipo">
                                            <option value="0">Administrativo</option>
                                            <option value="1">Docente</option>
                                            <option value="2">Monitor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                            <input type="text" id="actualizarApellido" name="actualizarApellido" class="form-control" placeholder="Apellido" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Documento Identificacion</label>
                                            <input type="number" id = "actualizarIdentificacion" name="actualizarIdentificacion" class="form-control" placeholder="Cedula o Tarjeta identidad" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Contacto </label>
                                            <input type="number" id="actualizarNumeroCel" name="actualizarNumeroCel" class="form-control" placeholder="Numero telefonico" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleFormControlSelect1">Instituto</label>
                                        <select class="form-control" id="actualizarInstituto" name="actualizarInstituto">
                                            <option value="0">Udev</option>
                                            <option value="1">Compubuga</option>
                                            <option value="2">Moscati</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                        <button type="submit" name="modificarUsuario" id="modificarUsuario"class="btn btn-primary">Modificar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        getDatos()
        document.getElementById('buscar').addEventListener('keyup', getDatos)

        function getDatos(){
            let input = document.getElementById("buscar").value
            let content = document.getElementById("tabla")
            let url = "controlInfoUser.php"
            let formaData = new FormData()
            formaData.append('buscar', input)

            fetch(url, {
            method: "POST",
            body: formaData
            }).then(response => response.json())
            .then(data=> {
             content.innerHTML = data
            }).catch(err => console.log(err))
            
        }

        function optimizar(infoUser){

        }
    </script>
    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>

</body>
</html>