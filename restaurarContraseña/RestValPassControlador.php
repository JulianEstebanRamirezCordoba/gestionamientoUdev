<?php
    session_start();
    
    if(isset($_POST['modificarPass'])){
        require_once "../util/utilModelo.php";
        $utilModelo = new utilModelo();
        define("TABLA", "usuario");

        if($_SESSION['cambio_pass']['usuario'] != null || $_SESSION['cambio_pass']['usuario'] != ""){
            $usuario = $_SESSION['cambio_pass']['usuario'];
            $valoresTraer = array("usu_id", "usu_password", "usu_estado");
            $camposCosult = array("usu_id");
            $valoresConsult = array($usuario);
            $limit = "LIMIT 1";

            $consultaDatosVal = $utilModelo->consultaDatosUnicos(TABLA, $valoresTraer, $camposCosult, $valoresConsult, $limit);
                
                while($result = mysqli_fetch_assoc($consultaDatosVal)){
                    if($result != null){
                        $valoresUsuarios = array('id'=>$result['usu_id'], 'pass'=>$result['usu_password'], 'estado'=>$result['usu_estado']);
                    }
                }

            Actualizar($valoresUsuarios['id'], $valoresUsuarios['pass'], $valoresUsuarios['estado']);

        }else{
            echo "<body>
            <script src=\"//cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
            echo " <script>
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
                          
            swalWithBootstrapButtons.fire({
                title: 'Error no esperado comunicate con Administracion',
                text: 'El usuario se encuentra indefinido reinicio de precacion o seguridad',
                icon: 'error',
                showCancelButton: true,
                cancelButtonText: 'Reicio',
                reverseButtons: false
            }).then((result) => {
                if (
                    result.dismiss === Swal.DismissReason.cancel
                ){
                    window.location.href='../inicio/cierreSesion.php';
                )}
            })
            </script>
                </body>";  

        }

    }

    function Actualizar($id, $passwordActual, $estadoUsuario){
        global $utilModelo;

        $passwordNueva = filter_input(INPUT_POST, 'password');

        if($passwordActual != $passwordNueva){
            if($estadoUsuario == 1){
                $campoActu = array("password");
                $valoresActu = array($passwordNueva);
                $campoConsulta = array("usu_id");
                $valorConsulta = array($id);

                $utilModelo->actualizarDatos(TABLA, $campoActu, $valoresActu, $campoConsulta, $valorConsulta);

            }else{
                echo "<body>
            <script src=\"//cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
            echo " <script>
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
                          
            swalWithBootstrapButtons.fire({
                title: 'Usuario no activo',
                text: 'El usuario se encuentra inactivo por favor comunicate con administraccion',
                icon: 'error',
                showCancelButton: true,
                cancelButtonText: 'Ok',
                reverseButtons: false
            }).then((result) => {
                if (
                    result.dismiss === Swal.DismissReason.cancel
                ){
                    window.location.href='../inicio/cierreSesion.php';
                )}
            })
            </script>
                </body>"; 

            }
        }else{
            echo "<body>
            <script src=\"//cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
            echo " <script>
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
                          
            swalWithBootstrapButtons.fire({
                title: 'Contraseña que tal no recuerdes',
                text: 'La contraseña antes colocada ya a sido utilizada antes',
                icon: 'alert',
                showCancelButton: true,
                cancelButtonText: 'Ok',
                reverseButtons: false
            }).then((result) => {
                if (
                    result.dismiss === Swal.DismissReason.cancel
                ){
                    window.location.href='../inicio/cierreSesion.php';
                )}
            })
            </script>
                </body>" 

        }
    }


?>