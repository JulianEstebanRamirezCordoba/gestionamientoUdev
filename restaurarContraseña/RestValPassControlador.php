<?php
    session_start();
    
    if(isset($_POST['modificarPass'])){
        require_once "../util/utilModelo.php";
        $utilModelo = new utilModelo();
        define("TABLA", "usuario");

        if($_SESSION['cambio_pass']['usuario'] != null || $_SESSION['cambio_pass']['usuario'] != ""){
            $usuario = $_SESSION['cambio_pass']['usuario'];
            $valoresTraer = array("usu_password", "usu_estado");
            $camposCosult = array("usu_id");
            $valoresConsult = array($usuario);
            $limit = "LIMIT 1";

            $consultaDatosVal = $utilModelo->consultaDatosUnicos(TABLA, $valoresTraer, $camposCosult, $valoresConsult, $limit);
                
                while($result = mysqli_fetch_assoc($consultaDatosVal)){
                    if($result != null){
                        $valoresUsuarios = array('pass'=>$result['usu_password'], 'estado'=>$result['usu_estado']);
                    }
                }

            Actualizar($valoresUsuarios['pass'], $valoresUsuarios['estado']);

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

    function Actualizar($passwordActual, $estadoUsuario){
        global $utilModelo;

        $passwordNueva = filter_input(INPUT_POST, 'password');

        if($passwordActual != $passwordNueva){
            if($estadoUsuario == 1){
                echo "<body>
                <script src=\"//cdn.jsdelivr.net/npm/sweetalert2@11\"></script>"; 
                echo "Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                  })";

            }else{


            }
        }else{


        }
    }


?>