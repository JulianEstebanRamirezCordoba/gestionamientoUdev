<?php
require_once "../conexion.php";
include_once "../util/util.php";

$util = new util();
    define("TABLA_MH", "materia_asignada_horario");

    $column = ['id_materia2', 'id_horario2', 'id_sala1', 'id_usuario3', 'id_grupo1'];
    $porBusqueda = [ 'id_usuario3'];

    $campoBusqueda = isset($_POST['buscar']) ? $conexion->real_escape_string($_POST['buscar']) : null;

    $where = '';

    if($campoBusqueda != null){
        $where = " WHERE (";
        $cont = count($porBusqueda);
            for($i = 0; $i < $cont; $i++){
                $where .= $porBusqueda[$i] . " LIKE '%" . $campoBusqueda . "%' OR ";

            }
        $where = substr_replace($where, "" , -3);
        $where .= ");";

    }

    $camposExtraccion = implode(", ", $column);

    $consulta = "SELECT $camposExtraccion 
    FROM " . TABLA_MH.
    $where;

    $result = $conexion->query($consulta);

    $visual = "";

    if($result->num_rows >= 1){
        while($informe = $result->fetch_array()){
            if($informe != null){
                $informacionMateriaHorario = $informe[0] . "," . $informe[1] . "," . $informe[2] . ","
                . $informe[3] . "," . $informe[4] . "," . $informe[5] ;

            }

           

            $visual .= '<tr>';
            $visual .= '<td>'.$informe['mah_id'].'</td>';
            $visual .= '<td>'.$informe['id_materia2'].'</td>';
            $visual .= '<td>'.$informe['id_horario2'].'</td>';
            $visual .= '<td>'.$informe['id_sala1'].'</td>';
            $visual .= '<td>'.$informe['id_sala3'].'</td>';
            $visual .= '<td>'.$informe['id_grupo1'].'</td>';
           
            $visual .= "<td><a data-toggle=\"modal\" href=\"#editar\" onclick=\"sincronizar('$informacionMateriaHorario')\">Editar</a></td>";
            $visual .= '</tr>';
        }
    }else{
        $visual .= '<tr>';
        $visual .= '<td colspan="7" class="mb-2 f-w-500 text-center">Sin resultados en la busqueda</td>';
        $visual .= '</tr>'; 

    }

echo json_encode($visual, JSON_UNESCAPED_UNICODE);


if(!isset($_SESSION['usuario'])){
    header("Location: ../inicio/loginVista.php");
}
?>