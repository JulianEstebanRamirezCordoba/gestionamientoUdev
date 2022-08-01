<?php
    @session_start();
	include_once "../navegador/menuOrquestador.php";
?>

<section class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ breadcrumb ] start -->
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="page-header-title">
                                     
                            
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                        <select name="horario" class="form-select" style="width:41.7%" required>
                    <option selected disabled value="">HORARIO</option>

                    <?php
                            $tabla = "horario";
                            $utilModelo = new utilModelo();
                            $sql = $utilModelo->subConsultas($tabla,"*","1");

                            while($row = $sql->fetch_assoc()){
                                
                                /* El value en este option es el 'valor que se va a guardar en la base de datos:
                                 ej: [id_sala, que puede ser 1, 2, 3 etc].
                                Asi como tambien otro valor para mostrar en el formulario 
                                ej: [nombre_sala (que es el que aparece en las opciones)] */
                                echo "<option value = ".$row['hor_id'].">".$row['hor_dia_asignado']."-".$row['hor_diaHoraEntrada']."-".$row['hor_diaHoraSalida']."</option>";
                            }
                            
                        
                        ?>
                         
                         </select>
                             
                         <br><br>

                     <select name="sala" class="form-select" required>

                         <option selected disabled value="">SALA</option>

                    <?php
                            $tabla = "sala";
                            $utilModelo = new utilModelo();
                            $sql = $utilModelo->subConsultas($tabla,"*","1");
                            

                            while($row = $sql->fetch_assoc()){
                                
                                /* El value en este option es el 'valor que se va a guardar en la base de datos:
                                 ej: [id_sala, que puede ser 1, 2, 3 etc].
                                Asi como tambien otro valor para mostrar en el formulario 
                                ej: [nombre_sala (que es el que aparece en las opciones)] */
                                echo "<option value = ".$row['sal_id'].">".$row['sal_nombre']."-Institucion:".$row['sal_institucion']."-Capacidad maxima:".$row['sal_capacidadMaxima']."</option>";

                            }
                                                 

                        
                        ?> 

                </select>

                <br><br>

                     <select name="usuario" class="form-select" style="width:41.7%" required>

                         <option selected disabled value="">DOCENTE</option>

                    <?php
                            $tabla = "usuario";
                            $utilModelo = new utilModelo();
                            $sql = $utilModelo->subConsultas($tabla,"*","1");
                            

                            while($row = $sql->fetch_assoc()){
                                
                                /* El value en este option es el 'valor que se va a guardar en la base de datos:
                                 ej: [id_sala, que puede ser 1, 2, 3 etc].
                                Asi como tambien otro valor para mostrar en el formulario 
                                ej: [nombre_sala (que es el que aparece en las opciones)] */
                                echo "<option value = ".$row['usu_id'].">".$row['usu_nombre']." ".$row['usu_apellido']."</option>";

                            }
                                                 

                        
                        ?> 

                </select>

                <br><br>

                 <select name="grupo" class="form-select" style="width:41.7%" required>

                         <option selected disabled value="">GRUPO</option>

                    <?php
                            $tabla = "grupo";
                            $utilModelo = new utilModelo();
                            $sql = $utilModelo->subConsultas($tabla,"*","1");
                            

                            while($row = $sql->fetch_assoc()){
                                
                                /* El value en este option es el 'valor que se va a guardar en la base de datos:
                                 ej: [id_sala, que puede ser 1, 2, 3 etc].
                                Asi como tambien otro valor para mostrar en el formulario 
                                ej: [nombre_sala (que es el que aparece en las opciones)] */
                                echo "<option value = ".$row['gru_id'].">".$row['gru_nombre']." | Codigo:".$row['gru_codigo']." | Ciclo:".$row['gru_ciclo']." | Cantidad De Estudiantes:".$row['gru_cantidadEstudiantes']."</option>";

                            }
                                                 

                        
                        ?> 

                </select>
                <br><br>

                    
                                          <!-- Button trigger modal -->
                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGuardar">
                                            ASIGNAR HORARIO                                 
                                          </button>

                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                
                                            
                                        
                                    </div>
                                </div>
                                <!-- [ dark-table ] end -->
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>