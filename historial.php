<?php
include "log/nav.html";

require "connect.php";
?>
<style>
    <?php include "css/style.css"; ?>
</style>




        <div class="container">

            <h2 class="titleHistoral">Historial médico</h2>
    
            <form action="" class="formHistorial">
                <div>
                        <label for="">Nombre del paciente</label>
                        <input class="input_nombre " type="text">

                        <label for="">Nombre actual del médico</label>
                        <input class="input_nombre" type="text">

                        <label for="">Nombre actual de la farmacia</label>
                        <input class="input_nombre" type="text">   
                        
                    </div>
                    <div>
                        
                        <label for="">Fecha de última actualización</label>
                        <input class="input_numero " type="date">
                    
                        <label for="">Teléfono</label>
                        <input class="input_numero" type="number">
                    
                        <label for="">Teléfono</label>
                        <input class="input_numero" type="number">
                </div>
                
                
            </form>
        </div>


        <div
            class="tabla table-responsive container mt-3"
        >
        <h3>Medicamentos actuales y pasados</h3>
            <table
                class="table table-striped table-hover table-borderless table-secondary align-middle"
            >
                <thead class="table-secondary">
                    
                    <tr>
                        <th>Nombre del medicamento</th>
                        <th>Dosificación</th>
                        <th>Frecuencia</th>
                        <th>Médico</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha final</th>
                        <th>Propóstio</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr
                        class="table-secondary"
                    >
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    
                </tbody>
                
            </table>
        </div>
        <div
            class="tabla table-responsive container mt-3"
        >
        <h3>Procedimientos quirúrgicos</h3>
            <table
                class="table table-striped table-hover table-borderless table-secondary align-middle"
            >
                <thead class="table-secondary">
                    
                    <tr>
                        <th>Procedimiento</th>
                        <th>Médico</th>
                        <th>Hospital</th>
                        <th>Fecha</th>
                        <th>Notas</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr
                        class="table-secondary"
                    >
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    
                </tbody>
                
            </table>
        </div>
        <div
        class="tabla table-responsive container mt-3"
    >
    <h3>Enfermedades graves</h3>
        <table
            class="table table-striped table-hover table-borderless table-secondary align-middle"
        >
            <thead class="table-secondary">
                
                <tr>
                    <th>Enfermedad</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha final</th>
                    <th>Médico</th>
                    <th>Notas de tratamiento</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr
                    class="table-secondary"
                >
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </tbody>
            
        </table>





        <h3 class="vacunas">Vacunas</h3>
        <div class="tabla_doble">

            <table
                class="table table-striped table-hover table-borderless table-secondary align-middle"
            >
                <thead class="table-secondary">
                    
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr
                        class="table-secondary"
                    >
                        <td scope="row">Tétanos</td>
                        <td></td>
                        
                    </tr>
                    <tr
                        class="table-secondary"
                    >
                        <td scope="row">Vacuna contra la influencia</td>
                        <td></td>
                        
                    </tr>
                    <tr
                        class="table-secondary"
                    >
                        <td scope="row">Zostavax</td>
                        <td></td>
                        
                    </tr>
                    <tr
                        class="table-secondary"
                    >
                        <td scope="row">Otro:</td>
                        <td></td>
                        
                    </tr>
                    
                </tbody>
              
            </table>
            <table
                class="table table-striped table-hover table-borderless table-secondary align-middle"
            >
                <thead class="table-secondary">
                    
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr
                        class="table-secondary"
                    >
                        <td scope="row">Meningitis</td>
                        <td></td>
                        
                    </tr>
                    <tr
                        class="table-secondary"
                    >
                        <td scope="row">Fiebre amarilla</td>
                        <td></td>
                        
                    </tr>
                    <tr
                        class="table-secondary"
                    >
                        <td scope="row">Poliomielitis</td>
                        <td></td>
                        
                    </tr>
                    <tr
                        class="table-secondary"
                    >
                        <td scope="row">Otro:</td>
                        <td></td>
                        
                    </tr>
                    
                </tbody>
                
            </table>
        </div>

        </div>    























