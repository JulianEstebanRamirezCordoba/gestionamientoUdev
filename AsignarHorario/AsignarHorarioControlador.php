<?php
require_once "../util/utilModelo.php";
include_once "../util/util.php";

$util = new util();
$utilModelo = new utilModelo();

if(!isset($_SESSION['usuario'])){
    header("Location: ../inicio/loginVista.php");
}

if(isset($_POST['guardado'])){
    insertarDatos();
}

define("TABLA", "materia_asignada_horario");

function insertarDatos(){
    global $utilModelo;

    $materia = filter_input(INPUT_POST, "tipoMateria");
    $horario = filter_input(INPUT_POST, "tipoHorario");
    $sala = filter_input(INPUT_POST, "tipoSala");
    $usuario = filter_input(INPUT_POST, "tipoDocente");
    $grupo = filter_input(INPUT_POST, "tipoGru");

    $campos = array("id_materia2", "id_horario2", "id_sala1", "id_usuario3", "id_grupo1");
    $valoresEnvio = array($materia, $horario, $sala, $usuario, $grupo);
    $utilModelo->insertarDatos(TABLA, $campos, $valoresEnvio);

}


?>