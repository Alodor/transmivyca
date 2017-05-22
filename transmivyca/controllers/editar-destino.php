<?php
require_once '../models/class.destino.php';

$editar = new Destino();

// Saneamiento de variables
$id = htmlspecialchars($_POST['id_destino']);
$destino = htmlspecialchars($_POST['destino']);
$distancia = htmlspecialchars($_POST['distancia']);


// Validacion de variables
if (($id == "") || ($destino == "") || ($distancia == "")) {    
    echo "
    <div class='alert alert-danger alert-dismissable'>
        <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <div class='alert-body text-center'>No se puede actualizar registro</div>
    </div>";

// Ejecuta el metodo actualizar
} elseif ($editar->Actualizar($destino, $distancia, $id)) {
    echo "
    <script>
        swal({
        title: 'Actualizar Destino',
        text: 'Editado satisfactoriamente',
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
        <div class='alert-body text-center'>No se puede actualizar registro</div>
    </div>";
}