
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
                                            <h6>Sistema Gestion Udevo</h6>
                                                <br>
                                            <form action="" method="post">
                                                <div class="col-md-6">
                                                    <input class="form-control" id = "buscar" name = "buscar" type="text" placeholder="Buscar. . ." readonly>
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
                                                            <th>Instuticion</th>
                                                            <th>Tipo Usuario</th>
                                                            <th>Estado Usuario</th>
                                                            <th>Opciones Admin</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                        
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

    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>

</body>
</html>