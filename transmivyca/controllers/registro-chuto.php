<?php
require_once '../models/class.chuto.php';

$crear = new Chuto();

// Saneamiento de variables
$matricula = htmlspecialchars($_POST['matricula']);
$marca = htmlspecialchars($_POST['marca']);
$modelo = htmlspecialchars($_POST['modelo']);
$color = htmlspecialchars($_POST['color']);
$annio = htmlspecialchars($_POST['annio']);
$serial_motor = htmlspecialchars($_POST['serial_motor']);
$serial_carroceria = htmlspecialchars($_POST['serial_carroceria']);


// Validacion de variables
if (($matricula == "") || ($marca == "") || ($modelo == "") || ($color == "") || ($annio == "") || ($serial_motor == "") || ($serial_carroceria == "")) {    
    echo "
    <div class='alert alert-danger alert-dismissable'>
        <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <div class='alert-body text-center'>Chuto no puede ser registrado</div>
    </div>";

// Ejecuta el metodo registrar
} elseif ($crear->Crear($matricula, $marca, $modelo, $color, $annio, $serial_motor, $serial_carroceria)) {
    echo "
    <script>
        swal({
        title: 'Nuevo Chuto',
        text: 'Registrado satisfactoriamente',
        type: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
        closeOnConfirm: false
        },
        
        function() {
            location.href = '/transmivyca/views/chutos.php';
        });
    </script>";
    

} else {
    echo "
    <div class='alert alert-danger alert-dismissable'>
        <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <div class='alert-body text-center'>Chuto no puede ser registrado</div>
    </div>";
}