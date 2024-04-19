<?php
include "log/nav.html";
require "connect.php";

if(isset($_POST['submit'])) {
    if(isset($_POST['nombre']) && isset($_POST['apellido'])) {
        $nombre = mysqli_real_escape_string($connection, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($connection, $_POST['apellido']);

        $delete = "DELETE FROM pacientes WHERE nombre = '$nombre' AND apellido = '$apellido'";
        
        if (mysqli_query($connection, $delete)) {
            echo "<h2 class='mensajeSi'>Paciente borrado</h2>";
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
    <h2 class="mb-2">Eliminar pacientes</h2>
    <form class="formReg" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="mb-3 row">
            <label for="" class="form-label">Nombre de paciente</label>
            <input type="text" name="nombre" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3 row">
            <label for="" class="form-label">Apellidos del paciente</label>
            <input type="text" name="apellido" id="" aria-describedby="helpId" placeholder="">
        </div>
        <button type="submit" class="btn" name="submit" value="Eliminar">Eliminar</button>
    </form>
</div>
