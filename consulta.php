<?php

include "log/nav.html";
require "connect.php";

// Definir las variables de los datos del paciente
function mostrarTodosLosDatos($datos) {
    // Iterar sobre los datos y mostrarlos con echo
    foreach ($datos as $nombre_campo => $valor_campo) {
        echo "<p class='resultadosPaciente'><strong class='resultadoHistorialYProgreso'>$nombre_campo: </strong> $valor_campo</p>";
    }
}

if (isset($_POST['consultaHistorial']) || isset($_POST['consultaProgreso'])) {
    // Verificar qué formulario se envió
    if (isset($_POST['consultaHistorial'])) {
        // Consulta del historial médico
        if (isset($_POST['nombre_paciente'])) {
            $nombre_paciente = mysqli_real_escape_string($connection, $_POST['nombre_paciente']);
            
            $query = "SELECT * FROM historial WHERE nombre_paciente = '$nombre_paciente'";
            $result = mysqli_query($connection, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                // Obtener los datos del historial
                $row = mysqli_fetch_assoc($result);
                // Mostrar los datos del historial
                echo "<h2 class='datosPaciente'>Datos del historial médico:</h2>";
                mostrarTodosLosDatos($row);
            } else {
                echo "<h5 class='mensajeNo'>No se encontró ningún paciente con el nombre proporcionado</h5>";
            }
        }
    } elseif (isset($_POST['consultaProgreso'])) {
        // Consulta del progreso médico
        if (isset($_POST['nombre_paciente'])) {
            $nombre_paciente = mysqli_real_escape_string($connection, $_POST['nombre_paciente']);
            $query = "SELECT * FROM progreso WHERE nombre_paciente = '$nombre_paciente'";
            $result = mysqli_query($connection, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                // Obtener los datos del progreso
                $row = mysqli_fetch_assoc($result);
                // Mostrar los datos del progreso
                echo "<h2 class='datosPaciente'>Datos del progreso médico:</h2>";
                mostrarTodosLosDatos($row);
            } else {
                echo "<h5 class='mensajeNo'>No se encontró ningún paciente con el nombre proporcionado</h5>";
            }
        }
    }
}
?>
<style>
    <?php include "css/style.css"; ?>
</style>

<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" class="formDatos">
    <label>Nombre de paciente</label>
    <input type="text" name="nombre_paciente">
    <div class="botonesDatos">

        <input type="submit" class="btn" value="Buscar Historial" name="consultaHistorial">
        <input type="submit" class="btn" value="Buscar Progreso" name="consultaProgreso">
    </div>
</form>





