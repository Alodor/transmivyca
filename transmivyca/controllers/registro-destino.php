<?php
require_once '../models/class.destino.php';

$crear = new Destino();

// Saneamiento de variables
$destino = htmlspecialchars($_POST['destino']);
$distancia = htmlspecialchars($_POST['distancia']);


// Validacion de variables
if (($destino == "") || ($distancia == "")) {    
    echo "
    <div class='alert alert-danger alert-dismissable'>
        <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <div class='alert-body text-center'>Destino no puede ser registrado</div>
    </div>";

// Ejecuta el metodo registrar
} elseif ($crear->Crear($destino, $distancia)) {
    echo "
    <script>
        swal({
        title: 'Nuevo Destino',
        text: 'Registrado satisfactoriamente',
        type: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
        closeOnConfirm: false
        },
        
        function() {
            location.href = '/transmivyca/views/destinos.php';
        });
    </script>";
    

} else {
    echo "
    <div class='alert alert-danger alert-dismissable'>
        <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <div class='alert-body text-center'>Destino no puede ser registrado</div>
    </div>";
}