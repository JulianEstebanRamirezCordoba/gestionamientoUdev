<?php
require_once "../conexion.php";
include_once "../util/util.php";

$util = new util();
    $column = ['mah_id', 'usu_nombre', 'usu_apellido', 'mat_nombre', 'hor_dia_asignado', 'hor_diaHoraEntrada', 'hor_diaHoraSalida', 
    'sal_nombre', 'gru_nombre'];
    $porBusqueda = ['mat_nombre', 'usu_nombre','sal_nombre','gru_nombre','hor_dia_asignado','usu_apellido'];

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
    FROM materia_asignada_horario AS tabla_primaria
    LEFT JOIN materia AS m
    ON m.mat_id = tabla_primaria.id_materia2
    LEFT JOIN horario AS h 
    ON h.hor_id = tabla_primaria.id_horario2
    LEFT JOIN sala AS s 
    ON s.sal_id = tabla_primaria.id_sala1
    LEFT JOIN usuario AS usu
    ON usu.usu_id = tabla_primaria.id_usuario3
    LEFT JOIN grupo AS g 
    ON g.gru_id = tabla_primaria.id_grupo1 ".
    $where; 

    $result = $conexion->query($consulta);

    $visual = "";

    if($result->num_rows >= 1){
        while($informe = $result->fetch_array()){
            if($informe != null){
                $informacionMateriaHorario = $informe[0] . "," . $informe[1] . "," . $informe[2] . ","
                . $informe[3] . "," . $informe[4] . "," . $informe[5] . "," . $informe[6] . "," . 
                $informe[7] . "," . $informe[8];

            }

            $visual .= '<tr>';
            $visual .= '<td>'.$informe['mah_id'].'</td>';
            $visual .= '<td>'.$informe['usu_nombre'] . ' ' . $informe['usu_apellido'] . '</td>';
            $visual .= '<td>'.$informe['mat_nombre'].'</td>';
            $visual .= '<td>'.$informe['hor_dia_asignado'].'</td>';
            $visual .= '<td>'.$informe['hor_diaHoraEntrada'] . ' / ' . $informe['hor_diaHoraSalida'] . '</td>';
            $visual .= '<td>'.$informe['sal_nombre'].'</td>';
            $visual .= '<td>'.$informe['gru_nombre'].'</td>';
           
            if($_SESSION['usuario'][3] == 0){
                $visual .= "<td><a data-toggle=\"modal\" href=\"#eliminar\" onclick=\"sincronizar('$informacionMateriaHorario')
                \">Eliminar</a></td>";
        
            }
              $visual .= '</tr>';
        }
    }else{
        $visual .= '<tr>';
        $visual .= '<td colspan="7" class="mb-2 f-w-500 text-center">Sin resultados en la busqueda</td>';
        $visual .= '</tr>'; 

    }

echo json_encode($visual, JSON_UNESCAPED_UNICODE);

?>