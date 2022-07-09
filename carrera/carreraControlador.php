<?php

include '../util/utilModelo.php';
include '../util/util.php';

$util = new util();
$utilModelo = new utilModelo();

$nombre_carrera = filter_input(INPUT_POST, 'nombre_carrera');
$codigo_carrera = filter_input(INPUT_POST, 'codigo_carrera');
$ciclo_carrera = filter_input(INPUT_POST, 'ciclo_carrera');
$cantidadEstudiantes_carrera = filter_input(INPUT_POST, 'cantidadEstudiantes_carrera');
$estado = '1';//por defecto viene en 1 que es activo y 0 es inactivo


//guardar
 if(isset($_POST['guardarCarrera'])){

//$campos es el nombre de los campos tal cual aparece en la base de datos
$camposInsert = array("car_nombre", "car_codigo", "car_ciclo", "car_cantidadEstudiantes", "car_estado");
//$valores son los valores a almacenar
$valoresInsert = array("$nombre_carrera", "$codigo_carrera", "$ciclo_carrera", "$cantidadEstudiantes_carrera", "$estado");
//la funcion insertar recive el nombre de la tabla y los dos arrays de campos y valores
$nombreTabla = "carrera";

$utilModelo -> insertarDatos($nombreTabla, $camposInsert, $valoresInsert) ;

echo "si funciono";
$_SESSION['mensajeOk']="Accion realizada";
    header('Location:carreraVista.php');


//modificar
 }else if(isset($_POST['modificarCarrera'])){
    echo "modificar <br>";

    $id = $_POST['id'];

   //$campos es el nombre de los campos tal cual aparece en la base de datos
$camposActualizar = array("car_nombre", "car_codigo", "car_ciclo", "car_cantidadEstudiantes");
//$valores son los valores a almacenar
$valoresActualizar = array("$nombre_carrera", "$codigo_carrera", "$ciclo_carrera", "$cantidadEstudiantes_carrera");
//la funcion insertar recibe el nombre de la tabla y los dos arrays de campos y valores
$nombreTabla = "carrera";
$campoCondicion = "car_id";
$condiconIgual = "$id";

$utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
$_SESSION['mensajeOk']="Accion realizada";
header('Location:carreraVista.php');


}else{

        echo "Eliminar";
    
                $nombreTabla = "carrera";
                $valoresActualizar = array("0");
                $camposActualizar = array("estado_carrera");
                $id = $_POST['idEliminar'];

                $campoCondicion = "car_id";
                $condiconIgual = "$id";
    
                $utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
            $_SESSION['mensajeOk']="Accion realizada";
             header('Location:carreraVista.php');
    
       }

        exit();

?>