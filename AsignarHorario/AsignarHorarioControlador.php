<?php
require_once "../util/utilModelo.php";
include_once "../util/util.php";

$util = new util();
$utilModelo = new utilModelo();
define("TABLA_MAH", "materia_asignada_horario");

if(!isset($_SESSION['usuario'])){
    header("Location: ../inicio/loginVista.php");
}

if(isset($_POST['guardado'])){
    insertarDatos();
}else if(isset($_POST['eliminarAsignacion'])){
    eliminarDatos();
}

function insertarDatos(){
    global $utilModelo;

    $materia = filter_input(INPUT_POST, "tipoMateria");
    $horario = filter_input(INPUT_POST, "tipoHorario");
    $sala = filter_input(INPUT_POST, "tipoSala");
    $usuario = filter_input(INPUT_POST, "tipoDocente");
    $grupo = filter_input(INPUT_POST, "tipoGru");

    $validacionHecha = validarInfo($materia, $horario, $sala, $usuario, $grupo);

    if($validacionHecha == 1){
        $campos = array("id_materia2", "id_horario2", "id_sala1", "id_usuario3", "id_grupo1");
        $valoresEnvio = array($materia, $horario, $sala, $usuario, $grupo);
        $inserto = $utilModelo->insertarDatos(TABLA_MAH, $campos, $valoresEnvio);
    
        if($inserto == 1){
            $_SESSION['Ok_insert'] = "Se Asigno el horario correctamente";
            header("Location: AsignarHorarioVista.php");
        }else{
            $_SESSION['Error_insert'] = "Se Asigno incorrectamente por favor intentelo despues";
            header("Location: AsignarHorarioVista.php");
        }
    }
    
}

function validarInfo($campoMateria, $campoHorario, $campoSala, $campoUsuario, $campoGrupo){
    global $utilModelo;

    $retorno_Val = 0;

    $campoExtracion = array("*");
    $campoVal = array("id_usuario3", "id_horario2");
    $valorVal = array($campoUsuario, $campoHorario);
    $consultaValhoario = $utilModelo->consultaDatosUnicos(TABLA_MAH, $campoExtracion, $campoVal, $valorVal);

    if($consultaValhoario->num_rows >= 1){
        echo "<body>
        <script src=\"//cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
        echo " <script>
        Swal.fire({
            title: 'Alerta de Incoherrencia',
            text: 'El docente ya tiene asignado este horario',
            icon: 'alert',
            showCancelButton: false,
            confirmButtonColor: '#ff5733',
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='AsignarHorarioVista.php';
            }
            })
            </script>
            </body>";

            return $retorno_Val;

    }

    $campoExtraReserva = array("*");
    $campoValReserva = array("id_sala1");
    $valorValReserva = array($campoSala);
    $consultaValReserva = $utilModelo->consultaDatosUnicos(TABLA_MAH, $campoExtraReserva, $campoValReserva, $valorValReserva);

    if($consultaValReserva->num_rows >= 1){
        echo "<body>
        <script src=\"//cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
        echo " <script>
        Swal.fire({
            title: 'Alerta de Reserva',
            text: 'La aula se encuestra reservada verifica si ya has depurado la tabla de Asigancion',
            icon: 'alert',
            showCancelButton: false,
            confirmButtonColor: '#ff5733',
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='AsignarHorarioVista.php';
            }
            })
            </script>
            </body>";

            return $retorno_Val;

    }

    $campoExtracion = array("*");
    $campoVal = array("id_grupo1", "id_horario2");
    $valorVal = array($campoGrupo, $campoHorario);
    $consultaValhoario = $utilModelo->consultaDatosUnicos(TABLA_MAH, $campoExtracion, $campoVal, $valorVal);

    if($consultaValhoario->num_rows >= 1){
        echo "<body>
        <script src=\"//cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
        echo " <script>
        Swal.fire({
            title: 'Alerta de Incoherrencia',
            text: 'El grupo ya tiene asignado este horario con un docente aasignado',
            icon: 'alert',
            showCancelButton: false,
            confirmButtonColor: '#ff5733',
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='AsignarHorarioVista.php';
            }
            })
            </script>
            </body>";

            return $retorno_Val;

    }
    return 1;

}

function eliminarDatos(){
    global $utilModelo;

    if(isset($_POST['Eliminar'])){
        $idConsul = $_POST['Eliminar'];
        $campoCondicion = "mah_id";
        $accionEliminar = $utilModelo->eliminarDatos(TABLA_MAH, TABLA_MAH, $campoCondicion, $idConsul);

        header("Location: AsignarHorarioTabla.php");
    }

}

?>