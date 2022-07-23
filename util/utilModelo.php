<?php
    @session_start();
    include_once "../conexion.php";
    
    class utilModelo{

        function insertarDatos($nombreTabla, $camposInsert, $valoresInsert){
            global $conexion;
            $valoresConstrein = "";
            $camposConstrein = "";

            for($indexCampos = 0; $indexCampos < count($camposInsert); $indexCampos++){
                $camposConstrein = ($indexCampos == (count($camposInsert) - 1)) ? $camposConstrein."`".
                $camposInsert[$indexCampos]."`" : $camposConstrein."`".$camposInsert[$indexCampos]."`,";

            }

            for($indexValor = 0; $indexValor < count($valoresInsert); $indexValor++){
                $valoresConstrein = ($indexValor == (count($valoresInsert) - 1)) ? $valoresConstrein."'".
                $valoresInsert[$indexValor]."'" : $valoresConstrein."'".$valoresInsert[$indexValor]."',";

            }

            $consulta = "INSERT INTO `$nombreTabla` ($camposConstrein) 
            VALUES ($valoresConstrein);";
            $query = mysqli_query($conexion, $consulta);

            return $query;

        }

        function actualizarDatos($nombreTabla, $camposActualizar, $valoresActualizar, $campoCondicion, $condiconIgual){
            global $conexion;
            $valoresConstrain = "";

            for($index = 0; $index < count($valoresActualizar); $index++){
                $valoresConstrain = ($index == (count($valoresActualizar) - 1)) ? $valoresConstrain."`".
                $camposActualizar[$index]."` = '".$valoresActualizar[$index]."'" : $valoresConstrain."`".
                $camposActualizar[$index]."` = '".$valoresActualizar[$index]."',";
  
            }

            $consulta = "UPDATE `$nombreTabla` 
            SET $valoresConstrain 
            WHERE $campoCondicion = '$condiconIgual';";
            $query = mysqli_query($conexion, $consulta);

            return $query;

        }
      
        function consultaTodosDatos($nombreTabla, $camposConsult, $valoresConsult){
            global $conexion;
            $condicion = $camposConsult . " = '" . $valoresConsult . "'";

            $consulta = "SELECT * 
            FROM $nombreTabla 
            WHERE $condicion;";
            $query = mysqli_query($conexion, $consulta);

            return $query;

        } 

        function consultaDatosUnicos($nombreTabla = "", $camposExtraccion = array("*"), $camposConsult, $valoresConsult, $limite = ""){
            global $conexion;
            $condicion = "WHERE";
            $extraccion = "";

            for($index = 0; $index < count($camposConsult); $index++){
                $condicion = ($index == (count($camposConsult) - 1)) ? $condicion."`". $camposConsult[$index]."` = '"
                .$valoresConsult[$index]."'" : $condicion."`".$camposConsult[$index]."`= '".$valoresConsult[$index].
                "' AND ";

            }

            for($indexcamposEx = 0; $indexcamposEx < count($camposExtraccion); $indexcamposEx++){
                $extraccion = ($indexcamposEx == (count($camposExtraccion) - 1 )) ? $extraccion.
                $camposExtraccion[$indexcamposEx] : $extraccion. " ". $camposExtraccion[$indexcamposEx]. ", ";

            }
            
            $consulta = "SELECT $extraccion 
            FROM $nombreTabla 
            $condicion 
            $limite;"; 
            $query = mysqli_query($conexion, $consulta);

            return $query;

        }

        function consultaOperaciones($nombreTabla, $campoContar = "*", $camposValores, $valoresConsulta, $consultaAdicional = ""){
            global $conexion;
            $consulta = "WHERE ".$consultaAdicional;

            for($index = 0; $index < count($camposValores); $index++){
                $consulta = ($index == (count($camposValores) - 1)) ? $consulta." `". $camposValores[$index]."`  =  '"
                .$valoresConsulta[$index]."' " : $consulta." `".$camposValores[$index]."` = '".$valoresConsulta[$index].
                "' AND "; 

            }

            $sql = "SELECT COUNT($campoContar) AS op_resultado 
            FROM $nombreTabla 
            $consulta;";
            $query = mysqli_query($conexion, $sql);

            return $query;
        }

        function subConsultas($nombreTabla, $valoresExtraccion, $consulta){
        global $conexion;

        $consultaQuery = "SELECT $valoresExtraccion 
        FROM $nombreTabla 
        WHERE $consulta";
        $query = mysqli_query($conexion, $consultaQuery);

        return $query;

        }
    }

?>