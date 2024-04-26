<?php
require "connect.php";
require "registro.php";


if(isset($_POST['inicioSesion'])){
    $consult="SELECT email, contraseña FROM registro";
    if($consult == true){
        header("Location: home.php");
    } else{
        echo "<h2 class='mensajeNo'>No estas registrado</h2>";
    }
}



?>

<style>
    <?php include "css/style.css"; ?>
</style>


        <div class="contenedorIndex">


            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formIndex" method="post">
                <h2>Iniciar sesión</h2>
                <label>Email</label>
                <input type="email" name="email">
                <label>Contraseña</label>
                <input type="password" name="contraseña">
    
                <input type="submit" class="btn btnRegistrar" value="Iniciar sesión" name="inicioSesion">

                <p class="mt-5">Si no estas registrado <a href="registro.php" class="btn">Pincha aquí</a></p>
            </form>

            
        </div>
        

