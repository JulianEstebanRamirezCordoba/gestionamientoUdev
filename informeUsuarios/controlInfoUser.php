<?php
require_once "../conexion.php";
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
        $visual .= '<tr>';
        $visual .= '<td>'.$informe['usu_id'].'</td>';
        $visual .= '<td>'.$informe['usu_nombre'].'</td>';
        $visual .= '<td>'.$informe['usu_apellido'].'</td>';
        $visual .= '<td>'.$informe['usu_email'].'</td>';
        $visual .= '<td>'.$informe['usu_identificacion'].'</td>';
        $visual .= '<td>'.$informe['usu_telefono'].'</td>';
        $visual .= '<td>'.$informe['usu_institucion'].'</td>';
        $visual .= '<td>'.$informe['tipo_usuario'].'</td>';
        $visual .= '<td>'.$informe['usu_estado'].'</td>';
        $visual .= '<td><a href="">Editar</a></td>';
        $visual .= '</tr>';
    }
}else{
    $visual .= '<tr>';
    $visual .= '<td colspan="7" class="row justify-content-center">Sin resultados en la busqueda</td>';
    $visual .= '</tr>'; 

}

echo json_encode($visual, JSON_UNESCAPED_UNICODE);



?>