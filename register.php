<?php
include "log/nav.html";
require "connect.php";

if(isset($_POST['submit'])) {
    if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['tipo_habitacion']) && isset($_POST['num_habitacion'])) {
        $id = mysqli_real_escape_string($connection, $_POST['id']);
        $nombre = mysqli_real_escape_string($connection, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($connection, $_POST['apellido']);
        $tipo_habitacion = mysqli_real_escape_string($connection, $_POST['tipo_habitacion']);
        $num_habitacion = mysqli_real_escape_string($connection, $_POST['num_habitacion']);

        $insert = "INSERT INTO pacientes(id, nombre, apellido, tipo_habitacion, num_habitacion) VALUES ('$id', '$nombre', '$apellido', '$tipo_habitacion', '$num_habitacion')";
        
        if (mysqli_query($connection, $insert)) {
            echo "<h2 class='mensajeSi'>Paciente $nombre registrado</h2>";
        } else {
            echo mysqli_error($connection);
        }
    } else {
        echo "<h2 class='mensajeNo'>Por favor, completa todos los campos</h2>";
    }
}
?>

<style>
    <?php include "css/style.css"; ?>
</style>

<div class="container registro">
    <h2 class="mb-2">Registro de pacientes</h2>
    <form class="formReg" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="mb-3 row">
            <label for="" class="form-label">Código de paciente</label>
            <input type="number" name="id" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3 row">
            <label for="" class="form-label">Nombre de paciente</label>
            <input type="text" name="nombre" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3 row">
            <label for="" class="form-label">Apellidos del paciente</label>
            <input type="text" name="apellido" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3 row">
            <label for="" class="form-label">Tipo de habitación</label>
            <input type="text" name="tipo_habitacion" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3 row">
            <label for="" class="form-label">Número de habitación</label>
            <input type="number" name="num_habitacion" id="" aria-describedby="helpId" placeholder="">
        </div>
        <button type="submit" class="btn" name="submit" value="Registrar">Registrar</button>
    </form>
</div>

