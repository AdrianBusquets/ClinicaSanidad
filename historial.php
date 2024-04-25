<?php
include "log/nav.html";

require "connect.php";

if(isset($_POST['guardar'])){
    $codigo_paciente = $_POST['codigo_paciente'];
    $nombre_paciente = $_POST['nombre_paciente'];
    $nombre_medico = $_POST['nombre_medico'];
    $fecha_actualizacion = $_POST['fecha_actualizacion'];
    $telefono_paciente = $_POST['telefono_paciente'];
    $telefono_medico = $_POST['telefono_medico'];
    $nombre_medicamento = $_POST['nombre_medicamento'];
    $dosificacion = $_POST['dosificacion'];
    $frecuencia = $_POST['frecuencia'];
    $medico_medicina = $_POST['medico_medicina'];
    $fecha_inicio_medicamento = $_POST['fecha_inicio_medicamento'];
    $fecha_final_medicamento = $_POST['fecha_final_medicamento'];
    $proposito_medicamento = $_POST['proposito_medicamento'];
    $procedimiento_cirugia = $_POST['procedimiento_cirugia'];
    $medico_cirugia = $_POST['medico_cirugia'];
    $hospital_cirugia = $_POST['hospital_cirugia'];
    $fecha_cirugia = $_POST['fecha_cirugia'];
    $nota_cirugia = $_POST['nota_cirugia'];
    $enfermedad = $_POST['enfermedad'];
    $fecha_inicio_enfermedad = $_POST['fecha_inicio_enfermedad'];
    $fecha_final_enfermedad = $_POST['fecha_final_enfermedad'];
    $medico_enfermedad = $_POST['medico_enfermedad'];
    $nota_enfermedad = $_POST['nota_enfermedad'];
    $fecha_tetanos = $_POST['fecha_tetanos'];
    $fecha_influencia = $_POST['fecha_influencia'];
    $fecha_zostavax = $_POST['fecha_zostavax'];
    $fecha_otros1 = $_POST['fecha_otros1'];
    $fecha_meningitis = $_POST['fecha_meningitis'];
    $fecha_amarilla = $_POST['fecha_amarilla'];
    $fecha_poliomielitis = $_POST['fecha_poliomielitis'];
    $fecha_otros2 = $_POST['fecha_otros2'];


    $insert= "INSERT INTO historial(codigo_paciente,nombre_paciente,nombre_medico,fecha_actualizacion,telefono_paciente,telefono_medico,nombre_medicamento,dosificacion,frecuencia,medico_medicina,fecha_inicio_medicamento,fecha_final_medicamento,proposito_medicamento,procedimiento_cirugia,medico_cirugia,hospital_cirugia,fecha_cirugia,nota_cirugia,enfermedad,fecha_inicio_enfermedad,fecha_final_enfermedad,medico_enfermedad,nota_enfermedad,fecha_tetanos,fecha_influencia,fecha_zostavax,fecha_otros1,fecha_meningitis,fecha_amarilla,fecha_poliomielitis,fecha_otros2)VALUE($codigo_paciente,'$nombre_paciente','$nombre_medico','$fecha_actualizacion','$telefono_paciente','$telefono_medico','$nombre_medicamento','$dosificacion','$frecuencia','$medico_medicina','$fecha_inicio_medicamento','$fecha_final_medicamento','$proposito_medicamento','$procedimiento_cirugia','$medico_cirugia','$hospital_cirugia','$fecha_cirugia','$nota_cirugia','$enfermedad','$fecha_inicio_enfermedad','$fecha_final_enfermedad','$medico_enfermedad','$nota_enfermedad','$fecha_tetanos','$fecha_influencia','$fecha_zostavax','$fecha_otros1','$fecha_meningitis','$fecha_amarilla','$fecha_poliomielitis','$fecha_otros2')" or die(mysqli_error($connection));

    

    if (mysqli_query($connection, $insert)) {
        echo "<h2 class='mensajeSi'>Paciente $nombre_paciente registrado</h2>";
    } else {
        echo mysqli_error($connection);
    }
    
} else {
    if(isset($_POST['guardar'])){
        echo "<h2 class='mensajeNo'>Por favor, completa todos los campos</h2>";
    }
    
}




?>
<style>
    <?php include "css/style.css"; ?>
</style>




        <div class="container">

            <h2 class="titleHistoral">Historial médico</h2>
    
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formHistorial" method="post">
                <div class="divForm">

                    <div>
                            <label >Código del paciente</label>
                            <input class="input_nombre" type="number" name="codigo_paciente">   
                            <label >Nombre del paciente</label>
                            <input class="input_nombre " type="text" name="nombre_paciente">
    
                            <label >Nombre actual del médico</label>
                            <input class="input_nombre" type="text" name="nombre_medico">
    
                            
                        </div>
                        <div>
                            
                            <label >Fecha de última actualización</label>
                            <input class="input_numero" type="date" name="fecha_actualizacion" >
                        
                            <label >Teléfono</label>
                            <input class="input_numero" type="number" name="telefono_paciente">
                        
                            <label >Teléfono</label>
                            <input class="input_numero" type="number" name="telefono_medico">
                    </div>
                </div>

                
                
                
            
        </div>


        <div
            class="tabla table-responsive container mt-3"
        >
        <h3>Medicamentos actuales y pasados</h3>
            <table
                class="table table-striped table-hover table-borderless table-secondary align-middle"
            >
                <thead class="table-secondary">
                    
                    <tr>
                        <th>Nombre del medicamento</th>
                        <th>Dosificación</th>
                        <th>Frecuencia</th>
                        <th>Médico</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha final</th>
                        <th>Propóstio</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr
                        class="table-secondary"
                    >
                        <td><input class="w-100" type="text" name="nombre_medicamento"></td>
                        <td><input class="w-100" type="text" name="dosificacion"></td>
                        <td><input class="w-100" type="text" name="frecuencia"></td>
                        <td><input class="w-100" type="text" name="medico_medicina"></td>
                        <td><input class="w-100" type="date" name="fecha_inicio_medicamento"></td>
                        <td><input class="w-100" type="date" name="fecha_final_medicamento"></td>
                        <td><input class="w-100" type="text" name="proposito_medicamento"></td>
                    </tr>
                    
                </tbody>
                
            </table>
        </div>
        <div
            class="tabla table-responsive container mt-3"
        >
        <h3>Procedimientos quirúrgicos</h3>
            <table
                class="table table-striped table-hover table-borderless table-secondary align-middle"
            >
                <thead class="table-secondary">
                    
                    <tr>
                        <th>Procedimiento</th>
                        <th>Médico</th>
                        <th>Hospital</th>
                        <th>Fecha</th>
                        <th>Notas</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr
                        class="table-secondary"
                    >
                        <td><input class="w-100" type="text" name="procedimiento_cirugia"></td>
                        <td><input class="w-100" type="text" name="medico_cirugia"></td>
                        <td><input class="w-100" type="text" name="hospital_cirugia"></td>
                        <td><input class="w-100" type="date" name="fecha_cirugia"></td>
                        <td><input class="w-100" type="text" name="nota_cirugia"></td>
                    </tr>
                    
                </tbody>
                
            </table>
        </div>
        <div
        class="tabla table-responsive container mt-3"
    >
    <h3>Enfermedades graves</h3>
        <table
            class="table table-striped table-hover table-borderless table-secondary align-middle"
        >
            <thead class="table-secondary">
                
                <tr>
                    <th>Enfermedad</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha final</th>
                    <th>Médico</th>
                    <th>Notas de tratamiento</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr
                    class="table-secondary"
                >
                    <td><input class="w-100" type="text" name="enfermedad"></td>
                    <td><input class="w-100" type="date" name="fecha_inicio_enfermedad"></td>
                    <td><input class="w-100" type="date" name="fecha_final_enfermedad"></td>
                    <td><input class="w-100" type="text" name="medico_enfermedad"></td>
                    <td><input class="w-100" type="text" name="nota_enfermedad"></td>
                </tr>
                
            </tbody>
            
        </table>





        <h3 class="vacunas">Vacunas</h3>
        <div class="tabla_doble">

            <table
                class="table table-striped table-hover table-borderless table-secondary align-middle"
            >
                <thead class="table-secondary">
                    
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr
                        class="table-secondary"
                    >
                        <td>Tétanos</td>
                        <td><input class="w-100" type="date" name="fecha_tetanos"></td>
                        
                    </tr>
                    <tr
                        class="table-secondary"
                    >
                        <td>Vacuna contra la influencia</td>
                        <td><input class="w-100" type="date" name="fecha_influencia"></td>
                        
                    </tr>
                    <tr
                        class="table-secondary"
                    >
                        <td>Zostavax</td>
                        <td><input class="w-100" type="date" name="fecha_zostavax"></td>
                        
                    </tr>
                    <tr
                        class="table-secondary"
                    >
                        <td>Otro:</td>
                        <td><input class="w-100" type="date" name="fecha_otros1"></td>
                        
                    </tr>
                    
                </tbody>
              
            </table>
            <table
                class="table table-striped table-hover table-borderless table-secondary align-middle"
            >
                <thead class="table-secondary">
                    
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr
                        class="table-secondary"
                    >
                        <td>Meningitis</td>
                        <td><input class="w-100" type="date" name="fecha_meningitis"></td>
                        
                    </tr>
                    <tr
                        class="table-secondary"
                    >
                        <td>Fiebre amarilla</td>
                        <td><input class="w-100" type="date" name="fecha_amarilla"></td>
                        
                    </tr>
                    <tr
                        class="table-secondary"
                    >
                        <td>Poliomielitis</td>
                        <td><input class="w-100" type="date" name="fecha_poliomielitis"></td>
                        
                    </tr>
                    <tr
                        class="table-secondary"
                    >
                        <td>Otro:</td>
                        <td><input class="w-100" type="date" name="fecha_otros2"></td>
                        
                    </tr>
                    
                </tbody>
                
            </table>
        </div>

        </div>    
            <div class="divBoton mb-2">

                    <button type="submit" class="btn" name="guardar">Guardar</button>
            </div>

        </form>





















