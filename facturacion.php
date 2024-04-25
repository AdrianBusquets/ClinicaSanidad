<script>
function calculoFactura() {
    let especialidad = document.querySelector('#especialidad').selectedIndex;
    let consultas = document.querySelector('#num_consultas').value;
    let precioTotal = document.querySelector('#precio_total');
    let cantidadTotal = 0;
    let precio;
    let precioInput = document.querySelector('#precio_input');

    if (especialidad == 0) {
        precio = 50;
        cantidadTotal = precio * consultas;
        precioTotal.value = cantidadTotal;
        precioInput.value = precio;
    }
    if (especialidad == 1) {
        precio = 60;
        cantidadTotal = precio * consultas;
        precioTotal.value = cantidadTotal;
        precioInput.value = precio;
    }
    if (especialidad == 2) {
        precio = 25;
        cantidadTotal = precio * consultas;
        precioTotal.value = cantidadTotal;
        precioInput.value = precio;
    }
}
</script>

<?php
include 'log/nav.html';
require "connect.php";
?>

<style>
    <?php include "css/style.css"; ?>
</style>

<?php
if(isset($_POST["enviar"])){
    $especialidad = $_POST['especialidad'];
    $direccion_especialidad = $_POST['direccion_especialidad'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $direccion_cliente = $_POST['direccion_cliente'];
    $precio = $_POST['precio_total'];

    $insert = "INSERT INTO facturacion (especialidad, direccion_especialidad, fecha_inicio, fecha_final, nombre_cliente, direccion_cliente, precio_total) VALUE ('$especialidad', '$direccion_especialidad', '$fecha_inicio', '$fecha_final', '$nombre_cliente', '$direccion_cliente', $precio)";

    $query = mysqli_query($connection, $insert);

    if($query){
        // Establecer el mensaje de factura guardada
        $mensaje = "<h3 class='mensajeSi'>Factura guardada</h3>";
    } else {
        // Establecer el mensaje de error
        $mensaje = "<h3 class='mensajeNo'>Error: " . mysqli_error($connection) . "</h3>";
    }
}
?>





<div class="container mt-2">
    <div id="mensajeFactura">
    <?php if(isset($mensaje)): ?>
        <?php echo $mensaje; ?>
    <?php endif; ?>
    </div>

    <form class="formFacturacion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="contFacturacion">
            <img class="logoClinca" src="img/logoClinica.png" alt="logo">
                <div class="mb-3 row d-flex justify-content-center">
                    <label><h5>Especialidad</h5></label>
                    <select id="especialidad" class="w-75" name="especialidad">
                        <option value="psiquiatria">Psiquiatría</option>
                        <option value="neuropsicologia">Neuropsicología</option>
                        <option value="grupal">Terapia grupal</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"><h5>Dirección</h5></label>
                    <textarea class="form-control" name="direccion_especialidad" id="" rows="3"></textarea>
                </div>
                
            
        </div>

        <div class="contPresupuesto">
            <h3>Presupuesto</h3>
            <div class="mb-3">
                <label for="" class="form-label"><h5>Fecha de presupuesto</h5></label>
                <input
                    type="date"
                    class="form-control"
                    name="fecha_inicio"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
            </div>
            <div class="mb-3">
                <label for="" class="form-label"><h5>Fecha de vencimiento</h5></label>
                <input
                    type="date"
                    class="form-control"
                    name="fecha_final"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
            </div>
            <div class="mb-3">
                <label for="" class="form-label"><h5>Presupuesto para</h5></label>
                <input
                    type="text"
                    class="form-control"
                    name="nombre_cliente"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
            </div>
            <div class="mb-3">
                <label for="" class="form-label"><h5>Dirección del cliente</h5></label>
                <textarea class="form-control" name="direccion_cliente" id="" rows="3"></textarea>
            </div>
        </div>

        <div class="contPrecio">
            Calcular presupuesto
        </div>

        <div class="incluye">
            <ul>
                <h5>Cita médica</h5>
                <li>Cita personalizada</li>
                <li>Seguimiento</li>
                <li>Revisión</li>
            </ul>
        </div>

        <div class="mb-3 calculo">
            <label for="" class="form-label">Número de consultas</label>
            <input
                type="text"
                class="form-control"
                name=""
                id="num_consultas"
                aria-describedby="helpId"
                placeholder=""
            />
            <label for="" class="form-label">Precio</label>
            <input
                type="text"
                class="form-control"
                name=""
                id="precio_input"
                aria-describedby="helpId"
                placeholder=""
                readonly
            />
            <label for="" class="form-label">Total a pagar</label>
            <input  name="precio_total" id="precio_total" value="" class="form-control" readonly>
        </div>
        <a class="btn botonCalculo" href="#" onclick="calculoFactura()">Calcular</a>
        <button class="btn botonEnviar" type="submit" name="enviar" value="enviar">Enviar</button>
    </form>
</div>


