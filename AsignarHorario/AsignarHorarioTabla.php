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
                                            <form action="AsignarHTablaControlador.php" method="post">
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
                                                            <th>Identificador</th>
                                                            <th>Nombre completo</th>
                                                            <th>Materia</th>
                                                            <th>Dia</th>   
                                                            <th>Hora entrada y salida</th>                                                          
                                                            <th>Aula</th>
                                                            <th>Grupo</th>
                                                            <?php
                                                            if($_SESSION['usuario'][3] == 0){
                                                                echo "<th>Eliminar</th>";
                                                            }
                                                            ?>

                                                            
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
    <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form action="AsignarHorarioControlador.php" method="POST">
                                    <input type="text" class="ocultarId" id="Eliminar" name="Eliminar">
                                <div class="form-group">
                                    <h5>¿Esta seguro de realizar esta accion?</h5>
                                </div>
                                <br>
                                <p class="text-muted mb-4 text-center">Recuerde que esta accion no sera revertible eliminara totalmente la informacion que desea depurar</p>
                                <div class="form-group">
                                    <center><button type="submit" name="eliminarAsignacion" id="eliminarAsignacion"class="btn btn-primary">Eliminar</button></center>
                                </div>
                            </form>
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
            let url = "AsignarHTablaControlador.php"
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

        function sincronizar(infoData){
            let admininstrarData = infoData.split(",");
            $('#Eliminar').val(admininstrarData[0]);
        }

    </script>
    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>

</body>
</html>
