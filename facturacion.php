<?php
include 'log/nav.html';
require 'connect.php';
?>
<style>
    <?php include "css/style.css"; ?>
</style>

<div class="container mt-2">

    <form class="formFacturacion" action="">
        <div class="contFacturacion">
            <img class="logoClinca" src="img/logoClinica.png" alt="logo">
                <div class="mb-3 row d-flex justify-content-center">
                    <label><h5>Especialidad</h5></label>
                    <select id="especialidad" class="w-75">
                        <option name="especialidad" value="psiquiatria">Psiquiatría</option>
                        <option name="especialidad" value="neuropsicologia">Neuropsicología</option>
                        <option name="especialidad" value="grupal">Terapia grupal</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"><h5>Dirección</h5></label>
                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                </div>
                
            
        </div>

        <div class="contPresupuesto">
            <h3>Presupuesto</h3>
            <div class="mb-3">
                <label for="" class="form-label"><h5>Fecha de presupuesto</h5></label>
                <input
                    type="date"
                    class="form-control"
                    name=""
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
                    name=""
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
                    name=""
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
            </div>
            <div class="mb-3">
                <label for="" class="form-label"><h5>Dirección del cliente</h5></label>
                <textarea class="form-control" name="" id="" rows="3"></textarea>
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
                disabled
            />
            <label for="" class="form-label">Total a pagar</label>
            <input
                type="text"
                class="form-control"
                name=""
                id="precio_total"
                aria-describedby="helpId"
                placeholder=""
                disabled
            />
        </div>
        <a class="btn botonCalculo" href="#" onclick="calculoFactura()">Calcular</a>
        
    </form>
</div>

<script>
   function calculoFactura(){
    let especialidad= document.querySelector('#especialidad').selectedIndex;
    let consultas= document.querySelector('#num_consultas').value;
    let precioTotal= document.querySelector('#precio_total');
    let cantidadTotal= 0;
    let precio;
    let precioInput= document.querySelector('#precio_input');

    if (especialidad == 0){
        precio = 50;
        cantidadTotal= precio*consultas;
        precioTotal.value= cantidadTotal;
        precioInput.value = precio;
    }
    if(especialidad == 1){
        precio = 60;
        cantidadTotal= precio*consultas;
        precioTotal.value= cantidadTotal;
        precioInput.value = precio;
    }
    if(especialidad == 2){
        precio = 25;
        cantidadTotal= precio*consultas;
        precioTotal.value= cantidadTotal;
        precioInput.value = precio;
    }
    
    
}





</script>