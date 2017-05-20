<?php
require_once '../models/class.chofer.php';

$crear = new Chofer();

// Saneamiento de variables
$cedula = htmlspecialchars($_POST['cedula']);
$nombre = htmlspecialchars($_POST['nombre']);
$apellido = htmlspecialchars($_POST['apellido']);
$direccion = htmlspecialchars($_POST['direccion']);
$telefono = htmlspecialchars($_POST['telefono']);
$fecha_ingreso = date("d-m-Y");
$estatus = htmlspecialchars($_POST['estatus']);


// Validacion de variables
if (($cedula == "") || ($nombre == "") || ($apellido == "") || ($direccion == "") || ($telefono == "") || ($estatus == "")) {    
    echo "
    <div class='panel panel-danger'>
        <div class='panel-body text-center'>Chofer no puede ser registrado</div>
    </div>";

// Ejecuta el metodo registrar
} elseif ($crear->Crear($cedula, $nombre, $apellido, $direccion, $telefono, $fecha_ingreso, $estatus)) {
    echo "
    <script>
        swal({
        title: 'Nuevo Chofer',
        text: 'Registrado satisfactoriamente',
        type: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
        closeOnConfirm: false
        },
        
        function() {
            location.href = '/transmivyca/views/chofer.php';
        });
    </script>";
    

} else {
    echo "
    <div class='panel panel-danger'>
        <div class='panel-body text-center'>Chofer no puede ser registrado</div>
    </div>";
}