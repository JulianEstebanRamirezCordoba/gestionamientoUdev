<?php

include '../util/utilModelo.php';
include '../util/util.php';

$util = new util();
$utilModelo = new utilModelo();

$nombre_grupo = filter_input(INPUT_POST, 'nombre_grupo');
$codigo_grupo = filter_input(INPUT_POST, 'codigo_grupo');
$ciclo_grupo = filter_input(INPUT_POST, 'ciclo_grupo');
$cantidadEstudiantes_grupo = filter_input(INPUT_POST, 'cantidadEstudiantes_grupo');
$estado = '1';//por defecto viene en 1 que es activo y 0 es inactivo


//guardar
 if(isset($_POST['guardarGrupo'])){
echo "metodo guardar"; 
//$campos es el nombre de los campos tal cual aparece en la base de datos
$camposInsert = array("gru_nombre", "gru_codigo", "gru_ciclo", "gru_cantidadEstudiantes", "gru_estado");
//$valores son los valores a almacenar
$valoresInsert = array("$nombre_grupo", "$codigo_grupo", "$ciclo_grupo", "$cantidadEstudiantes_grupo", "$estado");
//la funcion insertar recive el nombre de la tabla y los dos arrays de campos y valores
$nombreTabla = "carrera";

$utilModelo -> insertarDatos($nombreTabla, $camposInsert, $valoresInsert) ;

echo "si funciono";
$_SESSION['mensajeOk']="Accion realizada";
    header('Location:grupoVista.php');


//modificar
 }else if(isset($_POST['modificarGrupo'])){
    echo "modificar <br>"; 

    $id = $_POST['id'];

   //$campos es el nombre de los campos tal cual aparece en la base de datos
$camposActualizar = array("gru_nombre", "gru_codigo", "gru_ciclo", "gru_cantidadEstudiantes");
//$valores son los valores a almacenar
$valoresActualizar = array("$nombre_grupo", "$codigo_grupo", "$ciclo_grupo", "$cantidadEstudiantes_grupo");
//la funcion insertar recibe el nombre de la tabla y los dos arrays de campos y valores
$nombreTabla = "grupo";
$campoCondicion = "gru_id";
$condiconIgual = "$id";

$utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
$_SESSION['mensajeOk']="Accion realizada";
header('Location:grupoVista.php');


}else{

        echo "Eliminar <br>"; 

    
                $nombreTabla = "grupo";
                $camposActualizar = array("gru_estado");
                $id = $_POST['idEliminar'];
                $estadoActual = $_POST['modificarEstado'];

                if($estadoActual == 1){

                    $valoresActualizar = array("0");

                }else{

                    $valoresActualizar = array("1");

                }

                $campoCondicion = "gru_id";
                $condiconIgual = "$id";
    
                $utilModelo -> actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual);
            $_SESSION['mensajeOk']="Accion realizada"; 
            header('Location:grupoVista.php');
    
       }

        exit();

?>