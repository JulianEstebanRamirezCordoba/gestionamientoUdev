<?php

include '../util/utilModelo.php';
include '../util/util.php';

$util = new util();
$utilModelo = new utilModelo();

$nombre_docente = filter_input(INPUT_POST, 'nombre_docente');
$apellido_docente = filter_input(INPUT_POST, 'apellido_docente');
$identificacion= filter_input(INPUT_POST, 'identificacion');
$telefono= filter_input(INPUT_POST, 'telefono');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$tipo_usuario = filter_input(INPUT_POST, 'tipo_usuario');
$estado = '1';//por defecto viene en 1 que es activo y 0 es inactivo


//guardar
 if(isset($_POST['guardarUsuario'])){

//$campos es el nombre de los campos tal cual aparece en la base de datos
$camposInsert = array("nombre_docente", "apellido_docente", "identificacion","telefono","password","tipo_usuario");
//$valores son los valores a almacenar
$valoresInsert = array("$nombre_docente","$apellido_docente", "$identificacion","$telefono","$email","$password","$tipo_usuario");
//la funcion insertar recive el nombre de la tabla y los dos arrays de campos y valores
$nombreTabla = "usuario";

$utilModelo -> insertarDatos($nombreTabla, $camposInsert, $valoresInsert) ;

echo "si funciono";
$_SESSION['mensajeOk']="Accion realizada";
    header('Location:docentesVista.php');


//modificar
 }else if(isset($_POST['modificarDocente'])){
    echo "modificar <br>";

    $usu_id = $_POST['usu_id'];

   //$campos es el nombre de los campos tal cual aparece en la base de datos
$camposActualizar = array("nombre_docente", "apellido_docente", "identificacion","telefono","password","tipo_usuario");
//$valores son los valores a almacenar
$valoresActualizar = array("$nombre_docente","$apellido_docente", "$identificacion","$telefono","$email","$password","$tipo_usuario");
//la funcion insertar recibe el nombre de la tabla y los dos arrays de campos y valores
$nombreTabla = "usuario";
$campoCondicion = "usu_id";
$condiconIgual = "$usu_id";

$utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
$_SESSION['mensajeOk']="Accion realizada";
header('Location:docentesVista.php');


}else{

        echo "Eliminar";
    
                $nombreTabla = "usuario";
                $valoresActualizar = array("0");
                $camposActualizar = array("nombre_docente");
                $id = $_POST['idEliminar'];

                $campoCondicion = "usu_id";
                $condiconIgual = "$id";
    
                $utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
            $_SESSION['mensajeOk']="Accion realizada";
             header('Location:docentesVista.php');
    
       }

        exit();

?>