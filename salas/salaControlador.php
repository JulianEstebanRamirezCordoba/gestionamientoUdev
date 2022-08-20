<?php

include '../util/utilModelo.php';
include '../util/util.php';

$util = new util();
$utilModelo = new utilModelo();

$sal_id = filter_input(INPUT_POST, 'sal_id');
$sal_nombre = filter_input(INPUT_POST, 'sal_nombre');
$sal_institucion = filter_input(INPUT_POST, 'instituto_sala');
$sal_capacidadMaxima = filter_input(INPUT_POST, 'sal_capacidadMaxima');
$estado = '1';



//guardar
 if(isset($_POST['guardarSala'])){
$camposInsert = array("sal_nombre","sal_institucion","sal_capacidadMaxima","sal_estado");
$valoresInsert = array("$sal_nombre","$sal_institucion","$sal_capacidadMaxima","$estado");
$nombreTabla = "sala";
$validarGuardado = $utilModelo -> insertarDatos($nombreTabla, $camposInsert, $valoresInsert);

if($validarGuardado == 1){
    $_SESSION['mensajeOk']="Accion realizada";
    header('Location:salaVista.php');
}else{
    header('Location:salaVista.php');
}



//modificar
}else if(isset($_POST['modificarSala'])){
    echo "modificar <br>";

    $id = $_POST['id'];

    if($sal_institucion == "compubuga" || $sal_institucion == "Compubuga"){

        $sal_institucion = 1;
        
     }else if($sal_institucion == "moscati" || $sal_institucion == "Moscati"){

        $sal_institucion =2;
     }

   //$campos es el nombre de los campos tal cual aparece en la base de datos
$camposActualizar = array("sal_nombre","sal_institucion","sal_capacidadMaxima");
$valoresActualizar = array("$sal_nombre","$sal_institucion","$sal_capacidadMaxima");
$nombreTabla = "sala";
$campoCondicion = "sal_id";
$condiconIgual = "$id";

$utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);

if($validarGuardado == 1){
    $_SESSION['mensajeOk']="Accion realizada";
    header('Location:salaVista.php');
}else{
    header('Location:salaVista.php');
}
}else{
    $nombreTabla = "sala";
    $camposActualizar = array("sal_estado");
    $id = $_POST['idEliminar'];
    $estadoActual = $_POST['modificarEstado'];
    if($estadoActual == 1){
        $valoresActualizar = array("0");
    }else{
        $valoresActualizar = array("1");
    }

    $campoCondicion = "sal_id";
    $condiconIgual = "$id";
    
    $utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
    $_SESSION['mensajeOk']="Accion realizada"; 
    header('Location:salaVista.php');
    
    }
    
    exit();

?>