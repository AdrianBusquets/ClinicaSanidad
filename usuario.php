<?php
session_start();
require_once "connect.php";


if(isset($_POST['inicioSesion'])){
    $usuario= $_POST["usuario"];
    $contraseña= $_POST["contraseña"];
    $contraseña= hash("sha512", $contraseña);

    $access= mysqli_query($connection, "SELECT * FROM registro WHERE usuario= '$usuario' AND contraseña= '$contraseña'");




    if(mysqli_num_rows($access) > 0){
        $_SESSION["usuario"] = $usuario;
        header("Location: home.php");
        exit();

    } else{
        echo "
        <script> 
        alert ('Correo o contraseña incorrectos');
        window.location = 'index.php';
        </script>
        ";
        exit();
}
}

?>