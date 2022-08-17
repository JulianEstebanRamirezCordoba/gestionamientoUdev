<?php

include '../util/utilModelo.php';
include '../util/util.php';

$util = new util();
$utilModelo = new utilModelo();

$sal_nombre = filter_input(INPUT_POST, 'sal_nombre');
$sal_capacidadMaxima = filter_input(INPUT_POST, 'sal_capacidadMaxima');
$estado = '1';//por defecto viene en 1 que es activo y 0 es inactivo



//guardar
 if(isset($_POST['guardarSala'])){

//$campos es el nombre de los campos tal cual aparece en la base de datos
$camposInsert = array("sal_nombre", "sal_capacidadMaxima","sal_estado");
//$valores son los valores a almacenar
$valoresInsert = array("$sal_nombre", "$$sal_capacidadMaxima","$estado");
//la funcion insertar recive el nombre de la tabla y los dos arrays de campos y valores
$nombreTabla = "sala";

$utilModelo -> insertarDatos($nombreTabla, $camposInsert, $valoresInsert) ;

echo "si funciono";
$_SESSION['mensajeOk']="Accion realizada";
    header('Location:salaVista.php');


//modificar
 }else if(isset($_POST['modificarSala'])){
    echo "modificar <br>";

    $id = $_POST['id'];

   //$campos es el nombre de los campos tal cual aparece en la base de datos
$camposActualizar = array("sal_nombre", "sal_capacidadMaxima");
//$valores son los valores a almacenar
$valoresActualizar = array("$sal_nombre", "$sal_capacidadMaxima");
//la funcion insertar recibe el nombre de la tabla y los dos arrays de campos y valores
$nombreTabla = "sala";
$campoCondicion = "sal_id";
$condiconIgual = "$id";

$utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
$_SESSION['mensajeOk']="Accion realizada";
header('Location:salaVista.php');


}else{

        echo "Eliminar";
    
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