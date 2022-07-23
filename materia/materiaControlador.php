<?php

include '../util/utilModelo.php';
include '../util/util.php';

$util = new util();
$utilModelo = new utilModelo();

$nombre_materia = filter_input(INPUT_POST, 'nombre_materia');

//$estado = '1';//por defecto viene en 1 que es activo y 0 es inactivo


//guardar
 if(isset($_POST['guardarMateria'])){

//$campos es el nombre de los campos tal cual aparece en la base de datos
$camposInsert = array("mat_nombre");
//$valores son los valores a almacenar
$valoresInsert = array("$nombre_materia");
//la funcion insertar recive el nombre de la tabla y los dos arrays de campos y valores
$nombreTabla = "materia";

$utilModelo -> insertarDatos($nombreTabla, $camposInsert, $valoresInsert) ;

echo "si funciono";
$_SESSION['mensajeOk']="Accion realizada";
    header('Location:materiaVista.php');


//modificar
}else if(isset($_POST['modificar_materia'])){
    echo "modificar <br>";

    $id = $_POST['codigoE'];

   //$campos es el nombre de los campos tal cual aparece en la base de datos
$camposActualizar = array("mat_nombre");
//$valores son los valores a almacenar
$valoresActualizar = array("$nombre_materia");
//la funcion insertar recibe el nombre de la tabla y los dos arrays de campos y valores
$nombreTabla = "materia";
$campoCondicion = "mat_id";
$condiconIgual = "$id";

$utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
$_SESSION['mensajeOk']="Accion realizada";
header('Location:materiaVista.php');

}else{

        echo "Eliminar";
    
                $nombreTabla = "materia";
                $valoresActualizar = array("0");
                $camposActualizar = array("mat_nombre");
                $id = $_POST['idEliminar'];

                $campoCondicion = "mat_id";
                $condiconIgual = "$id";
    
                $utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
            $_SESSION['mensajeOk']="Accion realizada";
             header('Location:materiaVista.php');
    
       }

        exit();

?>