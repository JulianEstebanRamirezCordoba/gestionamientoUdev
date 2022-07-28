<?php
require_once "../util/utilModelo.php";
include_once "../util/util.php";

$util = new util();
$utilModelo = new utilModelo();

if(!isset($_SESSION['usuario'])){
    header("Location: ../inicio/loginVista.php");
}

define("TABLA", "usuario");


if(isset($_POST['registrar'])){
    insertarDatos();

}else if(isset($_POST['modificarUsuario'])){
    actualizarDatos();

}


function insertarDatos(){
    global $utilModelo;

    $estado = 1;

    $nombreU = filter_input(INPUT_POST, "nombre");
    $apellido = filter_input(INPUT_POST, "apellido");
    $email = filter_input(INPUT_POST, "correo");
    $password = filter_input(INPUT_POST, "password");
    $documento = filter_input(INPUT_POST, "identificacion");
    $telefono = filter_input(INPUT_POST, "numeroCel");
    $tipo = filter_input(INPUT_POST, "tipoSelect");
    $instituto = filter_input(INPUT_POST, "instituoSelect");

    $extraccionSelect = array("usu_id", "usu_email");
    $campoSelect = array("usu_email", "usu_identificacion");
    $valorSelect = array($email, $documento);

    $consulta = $utilModelo->consultaDatosUnicos(TABLA, $extraccionSelect, $campoSelect, $valorSelect);

    if($consulta->num_rows == 0){
        $camposDataBase = array("usu_nombre", "usu_apellido", "usu_identificacion", 
        "usu_telefono", "usu_email", "usu_password", "usu_institucion", "tipo_usuario", "usu_estado");
        $valoresInsert = array($nombreU, $apellido, $documento, $telefono, $email, $password, $instituto,
        $tipo, $estado);

        $insercion = $utilModelo->insertarDatos(TABLA, $camposDataBase, $valoresInsert);
        if($insercion == 1){
            $_SESSION['enviadoBien'] = "El registro se a creado correcta mente";
            header("Location: visualCreacionUser.php");

        }else{
            $_SESSION['enviadoIncorrecto'] = "El registro no se a realizado correctamente";
            header("Location: visualCreacionUser.php");

        }

    }else{
        echo "<body>
        <script src=\"//cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
        echo " <script>
        Swal.fire({
            title: 'Alerta Usuario ya registrado',
            text: 'El usuario ya existe en nuestra pagina por favor verifica esta informnacion',
            icon: 'alert',
            showCancelButton: false,
            confirmButtonColor: '#ff5733',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='visualCreacionUser.php';
            }
            })
            </script>
            </body>";

    }
}

function actualizarDatos(){
    global $utilModelo;

    $nombreActualizado = filter_input(INPUT_POST, "actualizarNombre");
    $apellidoActualizado = filter_input(INPUT_POST, "actualizarApellido");
    $correoActualizado = filter_input(INPUT_POST, "actualizarCorreo");
    $celularActualizado = filter_input(INPUT_POST, "actualizarNumeroCel");
    $documentoActualizado = filter_input(INPUT_POST, "actualizarIdentificacion");
    $tipoActualizado = filter_input(INPUT_POST, "actualizarTipo");
    $estadoActualizado = filter_input(INPUT_POST, "actualizarEstado");
    $institutoActualizado = filter_input(INPUT_POST, "actualizarInstituto");

    $campoActualizarDataBase = array("usu_nombre", "usu_apellido", "usu_email", "usu_telefono", 
    "usu_identificacion", "tipo_usuario", "usu_estado", "usu_institucion");
    $valoresActualizar = array($nombreActualizado, $apellidoActualizado, $correoActualizado,
    $celularActualizado, $documentoActualizado, $tipoActualizado, $estadoActualizado, 
    $institutoActualizado);

    $condicion = "usu_id";

    if(isset($_POST['id'])){
        $idUsuario = $_POST['id'];
        $accion = $utilModelo->actualizarDatos(TABLA, $campoActualizarDataBase, $valoresActualizar, $condicion, $idUsuario);
    
        if($accion == 1){
            $_SESSION['actualizar'] = "Ok vista";

        }else{
            $_SESSION['actualizar'] = "Error actualizar";

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
            title: 'Error al modificar usuario',
            text: 'Usuario no encontrado intente de nuevo mas tarde',
            icon: 'error',
            showCancelButton: true,
            cancelButtonText: 'Salir',
            reverseButtons: false
          }).then((result) => {
            if (
              result.dismiss === Swal.DismissReason.cancel
            ) {
                window.location.href='visualInfoUser.php';
              )
            }
          })
            </script>
            </body>";

    }

}

?>