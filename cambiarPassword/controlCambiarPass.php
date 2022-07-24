<?php
session_start();

require_once "../util/utilModelo.php";
include_once "../util/util.php";

$util = new util();
$utilModelo = new utilModelo();

if(isset($_POST['modificarPass'])){
    $passNueva = filter_input(INPUT_POST, "password");

    cambiarPass($passNueva);

}

function cambiarPass($nueva){
global $utilModelo;

    if(isset($_SESSION['usuario'])){
        $nombreTabla = "usuario";
        $campoActualizar = array("usu_password");
        $valorActalizar = array($nueva);
        $campoCondicion = "usu_id";
        $idUsuario = $_SESSION['usuario'][0];

        echo $idUsuario;
        die();

        $val = $utilModelo->actualizarDatos($nombreTabla, $campoActualizar, $valorActalizar, $campoCondicion, $idUsuario);

            if($val >= $idUsuario){
                $_SESSION['okPass'] = "Se a realizado la accion favorablemente";
                header("Location: visualCambiarPass.php");

            }else{
                $_SESSION['errorPass'] = "No se a realizado correctamente el cambio de contraseña";
                header("Location: visualCambiarPass.php");
            }

    }else{
        echo "<body>
        <script src=\"//cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
        echo " <script>
        Swal.fire({
            title: 'Alerta de uso malisioso',
            text: 'Se presenta error con la validacion de tu existencia en nuesta aplicacion',
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#ff5733',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='../inicio/cierreSesion.php';
            }
            })
            </script>
            </body>";

    }

}

?>