<?php
include "log/nav.html";

require "connect.php";
?>
<style>
    <?php include "css/style.css"; ?>
</style>

<?php
$id = $nombre = $apellido = $tipo_habitacion = $num_habitacion = "";

if(isset($_POST['nombre']) && isset($_POST['apellido'])) {
    $nombre = mysqli_real_escape_string($connection, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($connection, $_POST['apellido']);

    $query = "SELECT * FROM pacientes WHERE nombre = '$nombre' AND apellido = '$apellido'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $tipo_habitacion = $row['tipo_habitacion'];
        $num_habitacion = $row['num_habitacion'];
    } else {
        echo "<h5 class='mensajeNo'>No se encontró ningún paciente con el nombre y apellido proporcionados</h5>";
    }
}

if(isset($_POST['modificar'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $nombre_mod = mysqli_real_escape_string($connection, $_POST['nombre_mod']);
    $apellido_mod = mysqli_real_escape_string($connection, $_POST['apellido_mod']);
    $tipo_habitacion = mysqli_real_escape_string($connection, $_POST['tipo_habitacion']);
    $num_habitacion = mysqli_real_escape_string($connection, $_POST['num_habitacion']);

    $query = "UPDATE pacientes SET nombre='$nombre_mod', apellido='$apellido_mod', tipo_habitacion='$tipo_habitacion', num_habitacion='$num_habitacion' WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if($result) {
        echo "<h5 class='mensajeSi'>Los datos se han modificado correctamente</h5>";
    } else {
        echo "<h5 class='mensajeNo'>Error al modificar los datos: </h5>" . mysqli_error($connection);
    }
}
?>
<!-- -------------------------SELECCION---------------------------- -->
<div class="container registro">
    <h2 class="mb-2">Modificar datos de paciente</h2>
    <form class="formReg" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="mb-3 row">
            <label for="" class="form-label">Nombre de paciente</label>
            <input type="text" name="nombre" id="" aria-describedby="helpId" placeholder="" value="<?php echo $nombre; ?>">
        </div>
        <div class="mb-3 row">
            <label for="" class="form-label">Apellidos del paciente</label>
            <input type="text" name="apellido" id="" aria-describedby="helpId" placeholder="" value="<?php echo $apellido; ?>">
        </div>
        <button class="btn" type="submit" name="buscar">Buscar</button>
    </form>
<!------------------------------MODIFICAR-------------------------->
    <?php if($nombre != "" && $apellido != ""): ?>
    <h3>Modificar datos de <?php echo $nombre . " " . $apellido; ?></h3>
    <form class="formReg" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="mb-3 row">
            <label for="" class="form-label">Código de paciente</label>
            <input type="number" name="id" id="" aria-describedby="helpId" placeholder="" value="<?php echo $id; ?>" readonly>
        </div>
        <div class="mb-3 row">
            <label for="" class="form-label">Nombre de paciente</label>
            <input type="text" name="nombre_mod" id="" aria-describedby="helpId" placeholder="" value="<?php echo $nombre; ?>">
        </div>
        <div class="mb-3 row">
            <label for="" class="form-label">Apellidos del paciente</label>
            <input type="text" name="apellido_mod" id="" aria-describedby="helpId" placeholder="" value="<?php echo $apellido; ?>">
        </div>
        <div class="mb-3 row">
            <label for="" class="form-label">Tipo de habitación</label>
            <input type="text" name="tipo_habitacion" id="" aria-describedby="helpId" placeholder="" value="<?php echo $tipo_habitacion; ?>">
        </div>
        <div class="mb-3 row">
            <label for="" class="form-label">Número de habitación</label>
            <input type="number" name="num_habitacion" id="" aria-describedby="helpId" placeholder="" value="<?php echo $num_habitacion; ?>">
        </div>
        <div class="d-flex justify-content-evenly">
            <button class="btn" type="submit" name="modificar">Modificar</button>
            <button class="btn" type="reset" name="Limpiar">Limpiar</button>
        </div>
    </form>
    <?php endif; ?>
</div>
