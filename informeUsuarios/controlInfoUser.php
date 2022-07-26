<?php
require_once "../conexion.php";
include_once "../util/util.php";

$util = new util();
define("TABLA_USER", "usuario");

$column = ['usu_id', 'usu_nombre', 'usu_apellido', 'usu_email', 'usu_identificacion', 
'usu_telefono', 'usu_institucion', 'tipo_usuario', 'usu_estado'];
$porBusqueda = ['usu_email', 'usu_identificacion'];

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
FROM " . TABLA_USER .
$where;

$result = $conexion->query($consulta);

$visual = "";

if($result->num_rows >= 1){
    while($informe = $result->fetch_assoc()){
        $instituto = converInstituto($informe['usu_institucion']);
        $tipoUser = convereeUsuario($informe['tipo_usuario']);
        $estado = $util->converEstado($informe['usu_estado']);

        $visual .= '<tr>';
        $visual .= '<td>'.$informe['usu_id'].'</td>';
        $visual .= '<td>'.$informe['usu_nombre'].'</td>';
        $visual .= '<td>'.$informe['usu_apellido'].'</td>';
        $visual .= '<td>'.$informe['usu_email'].'</td>';
        $visual .= '<td>'.$informe['usu_identificacion'].'</td>';
        $visual .= '<td>'.$informe['usu_telefono'].'</td>';
        $visual .= '<td>'.$instituto.'</td>';
        $visual .= '<td>'.$tipoUser.'</td>';
        $visual .= '<td>'.$estado.'</td>';
        $visual .= '<td><a data-toggle="modal" href="#editar">Editar</a></td>';
        $visual .= '</tr>';
    }
}else{
    $visual .= '<tr>';
    $visual .= '<td colspan="7" class="row justify-content-center">Sin resultados en la busqueda</td>';
    $visual .= '</tr>'; 

}

echo json_encode($visual, JSON_UNESCAPED_UNICODE);

function converInstituto($instituto){
    switch ($instituto) {
        case 0:
            $valorResult = "Udev";
            break;
        case 1:
            $valorResult = "Compubuga";
            break;
        
        case 2:
            $valorResult = "Moscati";
            break;
                
        default:
            $valorResult = "Extra O instituto externa";
            break;
   
    }

    return $valorResult; 

}

function convereeUsuario($tipoUsuario){
    switch ($tipoUsuario) {
        case 0:
            $retornoTipo = "Administrador";
            break;
        case 1:
            $retornoTipo = "Docente";
            break;
        
        case 2:
            $retornoTipo = "Monitor";
            break;
               
        default:
            $retornoTipo = "Extra O persona externa";
            break;
    }

    return $retornoTipo;

}

function actualizarDatos(){


}

function insertarDatos(){
    

}

?>