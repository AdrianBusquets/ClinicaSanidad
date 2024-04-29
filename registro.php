<?php
require "connect.php";
try{
if(isset($_POST['registrar'])){
    $nombre= $_POST['nombre'];
    $apellidos= $_POST['apellidos'];
    $email= $_POST['email'];
    $usuario= $_POST['usuario'];
    $contraseña= $_POST['contraseña'];
    $contraseña= hash("sha512", $contraseña);
    $contraseña2= $_POST['contraseña2'];
    $contraseña2= hash("sha512", $contraseña2);

    $insert= "INSERT INTO registro(nombre,apellidos,email,usuario,contraseña,contraseña2)VALUE('$nombre','$apellidos','$email','$usuario','$contraseña','$contraseña2')" or die(mysqli_error($insert));

    if($contraseña === $contraseña2){

        if(mysqli_query($connection, $insert)){
            if($insert){
                echo "<h2 class='mensajeSi'>Usuario $usuario registrado</h2>";
            }
            
            } else {
                echo mysqli_error($connection);
            }
    }else{
        echo "<h2 class='mensajeNo'>Las contraseña debe ser la misma</h2>";
    } 
    
}

} catch(Exception $e) {
    if($e->getMessage() == "Duplicate entry '$email' for key 'registro.email'"){
        echo "<h2 class='mensajeNo'>Este correo ya esta registrado</h2>";
    }
    if($e->getMessage() == "Duplicate entry '$usuario' for key 'registro.usuario'"){
        echo "<h2 class='mensajeNo'>Este usuario ya esta registrado</h2>";
    }
    // echo "<h2 class='mensajeNo'>Por favor, completa todos los campos</h2>";
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
        <label>Usuario</label>
        <input type="text" name="usuario">
        <label>Contraseña</label>
        <input type="password" name="contraseña">
        <label>Repite contraseña</label>
        <input type="password" name="contraseña2">
        <div class="bonotesRegistro">    
            <input type="submit" class="btn btnRegistrar" value="Registrar" name="registrar">
            <a href="index.php" class="btn btnVolver">Volver</a>
        </div>
    </form>

   
    </div>
