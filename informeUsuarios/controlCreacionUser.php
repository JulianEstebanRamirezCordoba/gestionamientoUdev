<?php
require_once "../util/utilModelo.php";
include_once "../util/util.php";

$util = new util();
$utilModelo = new utilModelo();

define("TABLA", "usuario");


if(isset($_POST['registrar'])){
    insertarDatos();

}else if(isset($_POST['actualizar'])){
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


        }
    }else{


    }
}

function actualizarDatos(){
    global $utilModelo;
    

}

?>