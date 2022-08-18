<?php

include '../util/utilModelo.php';
include '../util/util.php';

$util = new util();
$utilModelo = new utilModelo();

$sal_nombre = filter_input(INPUT_POST, 'sal_nombre');
$sal_capacidadMaxima = filter_input(INPUT_POST, 'sal_capacidadMaxima');
$estado = '1';

if(isset($_POST['guardarSala'])){
    $camposInsert = array("sal_nombre", "sal_capacidadMaxima","sal_estado");
    $valoresInsert = array("$sal_nombre", "$$sal_capacidadMaxima","$estado");
    $nombreTabla = "sala";

    $utilModelo -> insertarDatos($nombreTabla, $camposInsert, $valoresInsert) ;

    $_SESSION['mensajeOk']="Accion realizada";
    header('Location:salaVista.php');

}else if(isset($_POST['modificarSala'])){
    $id = $_POST['id'];
    $valoresActualizar = array("$sal_nombre", "$sal_capacidadMaxima");
    $nombreTabla = "sala";
    $campoCondicion = "sal_id";
    $condiconIgual = "$id";
    $camposActualizar = array("sal_nombre", "sal_capacidadMaxima");

    $utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);

    $_SESSION['mensajeOk']="Accion realizada";
    header('Location:salaVista.php');

}else{
    $nombreTabla = "sala";
    $valoresActualizar = array("0");
    $camposActualizar = array("sal_estado");
    $id = $_POST['idEliminar'];

    $campoCondicion = "sal_id";
    $condiconIgual = "$id";
    
    $utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
    $_SESSION['mensajeOk']="Accion realizada";
    header('Location:salaVista.php');
    
}
exit();

?>