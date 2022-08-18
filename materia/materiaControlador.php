<?php

include '../util/utilModelo.php';
include '../util/util.php';

$util = new util();
$utilModelo = new utilModelo();

$nombre_materia = filter_input(INPUT_POST, 'nombre_materia');
$estado = '1';


if(isset($_POST['guardarMateria'])){
    $camposInsert = array("mat_nombre","mat_estado");
    $valoresInsert = array("$nombre_materia","$estado");
    $nombreTabla = "materia";

    $utilModelo -> insertarDatos($nombreTabla, $camposInsert, $valoresInsert) ;

    $_SESSION['mensajeOk']="Accion realizada";
    header('Location:materiaVista.php');

}else if(isset($_POST['modificarMateria'])){
    $id = $_POST['id'];
    $camposActualizar = array("mat_nombre");
    $valoresActualizar = array("$nombre_materia");
    $nombreTabla = "materia";
    $campoCondicion = "mat_id";
    $condiconIgual = "$id";

    $utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
    $_SESSION['mensajeOk']="Accion realizada";
    header('Location:materiaVista.php');

}else{
    $nombreTabla = "materia";
    $camposActualizar = array("mat_estado");
    $id = $_POST['idEliminar'];
    $estadoActual = $_POST['modificarEstado'];

    if($estadoActual == 1){
        $valoresActualizar = array("0");
    }else{
        $valoresActualizar = array("1");
    }

    $campoCondicion = "mat_id";
    $condiconIgual = "$id";
    
    $utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
    $_SESSION['mensajeOk']="Accion realizada"; 
    header('Location:materiaVista.php');
    
    }
    
    exit();

?>