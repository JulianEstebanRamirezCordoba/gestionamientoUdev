<?php
require_once "../util/utilModelo.php";
include_once "../util/util.php";

$util = new util();
$utilModelo = new utilModelo();
define("TABLA_ASIGNAR", "materia_asignada_horario");

if(!isset($_SESSION['usuario'])){
    header("Location: ../inicio/loginVista.php");
}

if(isset($_POST['guardado'])){
    insertarDatos();
}

function insertarDatos(){
    global $utilModelo;

    $materia = filter_input(INPUT_POST, "tipoMateria");
    $horario = filter_input(INPUT_POST, "tipoHorario");
    $sala = filter_input(INPUT_POST, "tipoSala");
    $usuario = filter_input(INPUT_POST, "tipoDocente");
    $grupo = filter_input(INPUT_POST, "tipoGru");

    $campos = array("id_materia2", "id_horario2", "id_sala1", "id_usuario3", "id_grupo1");
    $valoresEnvio = array($materia, $horario, $sala, $usuario, $grupo);
    $consulta = $utilModelo->insertarDatos(TABLA_ASIGNAR, $campos, $valoresEnvio);

    if($consulta == 1){
        $_SESSION['enviadoBien'] = "Se a Asignado orrectamente el registro";
        header("Location: AsignarHorarioVista.php");

    }else{
        $_SESSION['enviadoIncorrecto'] = "A ocurrido un error intente de nuevo";

    }

 

}


?>