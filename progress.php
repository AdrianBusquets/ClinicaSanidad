<?php
include "log/nav.html";

require "connect.php";

if(isset($_POST['guardar'])){
    $nombre_paciente= $_POST['nombre_paciente'];
    $fecha_nacimiento= $_POST['fecha_nacimiento'];
    $id_paciente= $_POST['id_paciente'];
    $id_registro_medico= $_POST['id_registro_medico'];
    $fecha_cita_proxima= $_POST['fecha_cita_proxima'];
    $fecha_revision= $_POST['fecha_revision'];
    $fecha_progreso= implode(", ", $_POST["fecha_progreso"]);
    $notas_progreso= implode(", ", $_POST["notas_progreso"]);


    $insert= "INSERT INTO progreso(nombre_paciente,fecha_nacimiento,id_paciente,id_registro_medico,fecha_cita_proxima,fecha_revision,fecha_progreso,notas_progreso)VALUE('$nombre_paciente','$fecha_nacimiento','$id_paciente','$id_registro_medico','$fecha_cita_proxima','$fecha_revision','$fecha_progreso','$notas_progreso')" or die(mysqli_error($connection));

    if (mysqli_query($connection, $insert)) {
        echo "<h2 class='mensajeSi'>Progreso registrado</h2>";
    } else {
        echo mysqli_error($connection);
    }
}
 else {
    if(isset($_POST['guardar'])){
        echo "<h2 class='mensajeNo'>No se ha podido registrar</h2>";
    }


}





?>

<style>
    <?php include "css/style.css"; ?>
</style>
       

        <h2 class="titleHistoral">Plantilla de progreso médico</h2>
        <div class="container contenedorProgress">

    
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formProgress" method="post">
                <div class="divProgress">

                    <label for="">Nombre del paciente</label>
                    <input type="text" name="nombre_paciente">

                    <label for="">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento">

                    <label for="">Identificación del paciente</label>
                    <input type="text" name="id_paciente">   
                    
                
                
                    
                    <label for="">Identificación del registro médico</label>
                    <input type="text" name="id_registro_medico">
                
                    <label for="">Próxima fecha de cita</label>
                    <input type="date" name="fecha_cita_proxima">
                
                    <label for="">Próxima fecha de revisión de tratamiento</label>
                    <input type="date" name="fecha_revision">
                </div>
                
                
                
           

            <div
                class="tabla_progreso table-responsive"
            >
            <h3>Progreso del paciente</h3>
                <table
                    class="table table-striped table-hover table-borderless table-secondary align-middle"
                >
                    <thead class="table-secondary">
                        
                        <tr>
                            <th>Fecha</th>
                            <th>Notas de progreso</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="añadir">
                        <tr
                            class="table-secondary"
                        >
                            <td><input class="w-100" type="date" name="fecha_progreso[]"></td>
                            <td><input class="w-100" type="text" name="notas_progreso[]"></td>
                        </tr>

                        
                    </tbody>
                    
                </table>
                <button class="btn" onclick="añadirMas()" type="button">Añadir progreso</button>
            </div>
        </div>
        <div class="text-center">

            <button class="btn my-1" type="submit" name="guardar" value="guardar">Guardar</button>
        </div>
        </form>

        <script>
            function añadirMas() {
                let añadir = document.createElement("tr");
                añadir.innerHTML= `
                <tr
                            class="table-secondary"
                        >
                        <td><input class="w-100" type="date" name="fecha_progreso[]"></td>
                            <td><input class="w-100" type="text" name="notas_progreso[]"></td>
                </tr>
                `
                document.querySelector("#añadir").appendChild(añadir);
            }
        </script>

