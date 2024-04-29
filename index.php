<?php

require "connect.php";
require_once "usuario.php";



if(isset($_POST['inicioSesion'])){
    $usuario= $_POST['usuario'];
    $contraseña= $_POST['contraseña'];
    $contraseña= hash("sha512", $contraseña);
    $consult="SELECT * FROM registro WHERE usuario= '$usuario' AND contraseña= '$contraseña'";
    if($consult == true){
        header("Location: home.php");
    } else{
        echo "<h2 class='mensajeNo'>No estas registrado</h2>";
        header("Location: registro.php");
    }
}



?>

<style>
    <?php include "css/style.css"; ?>
</style>


        <div class="contenedorIndex">


            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formIndex" method="post">
                <h2>Iniciar sesión</h2>
                <label>Usuario</label>
                <input type="text" name="usuario">
                <label>Contraseña</label>
                <input type="password" name="contraseña">
    
                <input type="submit" class="btn btnIndex" value="Iniciar sesión" name="inicioSesion">

                <p class="mt-5">Si no estas registrado <a href="registro.php" class="btn">Pincha aquí</a></p>
            </form>

            
        </div>
        

