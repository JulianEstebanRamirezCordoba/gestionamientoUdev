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
                                                <h4 class="m-b-6">Gestion de horarios asignados</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="row">Sistema Gestion Udev</h6>
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
                                                            
                                                            <th>Materia</th>
                                                            <th>Horario</th>
                                                            <th>Aula</th>   
                                                            <th>Grupo</th>                                                          
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
        <?php
        if(isset($_SESSION['actualizar'])) {
  	    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  		    <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Se realizo la edicion de la materia horario',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>
  	    <?php
      	    unset($_SESSION['actualizar']);
        }else if(isset($_SESSION['errorActualizar'])){

  	    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  		    <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Algo salio mal intentalo de nuevo',
                    showConfirmButton: false,
                    timer: 5000
                })
            </script>
  	    <?php
      	    unset($_SESSION['errorActualizar']);  
        }

  	    ?>
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
                                <input type="hidden" class="ocultarId" id="idActualizar" name="idActualizar">
                                <div class="form-group">
                                    <label>Materia</label>
                                        <input type="text" class="form-control" id="actualizarMateria" name="actualizarMateria" placeholder="Nombre de la materia" required>
                                </div>
                                <div class="form-group">
                                    <label >Horario</label>
                                        <input type="text" class="form-control" id="actualizarHorario" name="actualizarHorario" placeholder="Nombre de la materia" required>
                                </div>
                                
                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Aula</label>
                                            <input type="text" id="actualizarAula" name="actualizarAula" class="form-control" placeholder="Aula" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Usuario</label>
                                            <input type="text" id = "actualizarUsuario" name="actualizarUsuario" class="form-control" placeholder="Usuario" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Grupo </label>
                                            <input type="text" id="actualizarGrupo" name="actualizarGrupo" class="form-control" placeholder="Grupo" required>
                                    </div>
                                    <div class="form-group">
                                    
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

        function sincronizar(infoUser){
            let admin = infoUser.split(",");

            $('#idActualizar').val(admin[0]);
            $('#actualizarMateria').val(admin[1]);
            $('#actualizarHorario').val(admin[2]);
            $('#actualizarSala').val(admin[3]);
            $('#actualizarUsuario').val(admin[4]);
            $('#actualizarGrupo').val(admin[5]);
           
        }
    </script>
    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>

</body>
</html>

