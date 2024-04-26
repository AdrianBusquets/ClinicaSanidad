<?php
require "connect.php";

if(isset($_POST['registrar'])){
    $nombre= $_POST['nombre'];
    $apellidos= $_POST['apellidos'];
    $email= $_POST['email'];
    $telefono= $_POST['telefono'];
    $contraseña1= $_POST['contraseña1'];
    $contraseña2= $_POST['contraseña2'];

    $insert= "INSERT INTO registro(nombre,apellidos,email,telefono,contraseña1,contraseña2)VALUE('$nombre','$apellidos','$email',$telefono,'$contraseña1','$contraseña2')" or die(mysqli_error($insert));

    if($contraseña1 === $contraseña2){

        if(mysqli_query($connection, $insert)){
            echo "<h2 class='mensajeSi'>Usuario $nombre registrado</h2>";
            } else {
                echo mysqli_error($connection);
            }
    }else{
        echo "<h2 class='mensajeNo'>Las contraseña debe ser la misma</h2>";
    }
    } else {
        echo "<h2 class='mensajeNo'>Por favor, completa todos los campos</h2>";
    
    
}



?>

<style>
    <?php include "css/style.css"; ?>
</style>

<div class="contenedorRegistro">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formRegistro" method="post">
        <h2>Registrarse</h2>
        <label>Nombre</label>
        <input type="text" name="nombre">
        <label>Apellidos</label>
        <input type="text" name="apellidos">
        <label>Email</label>
        <input type="email" name="email">
        <label>Teléfono</label>
        <input type="number" name="telefono">
        <label>Contraseña</label>
        <input type="password" name="contraseña1">
        <label>Repite contraseña</label>
        <input type="password" name="contraseña2">
            
        <input type="submit" class="btn btnRegistrar" value="Registrar" name="registrar">
    </form>
</div>