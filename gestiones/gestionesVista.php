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
                                            <form action="gestionesControlador.php" method="post">
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
                                                            <th>ID</th>
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
    <script>
        getDatos()
        document.getElementById('buscar').addEventListener('keyup', getDatos)

        function getDatos(){
            let input = document.getElementById("buscar").value
            let content = document.getElementById("tabla")
            let url = "gestionesControlador.php"
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

    </script>
    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>

</body>
</html>

