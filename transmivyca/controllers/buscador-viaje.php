<?php
session_start();
require_once '../models/class.asignar-viaje.php';

$listar = new AsignarViaje();
$valor = $_POST['consulta'];

$salida = "";

if (isset($valor)) {
    $data = $listar->Buscar($valor);
    
    $salida .= "
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Número Guía</th>
                <th>Chofer</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody class='text-center'>";
    
        foreach ($data as $row) {
        
        $salida .= "
            <tr>
                <td>" .$row['id_viaje']. "</td>
                <td>" .$row['numero_guia']. "</td>
                <td>" .$row['nombre']. " " .$row['apellido']. "</td>
                <td>" .$row['origen']. "</td>
                <td>" .$row['destino']. "</td>
                <td>" .$row['razon_social']. "</td>
                <td>" .$row['fecha']. "</td>
                <td>";
                                       
        if ($_SESSION['privilegio'] == "administrador") {
            
        $salida .= "                                
            <a class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Eliminar' onclick='eliminarViaje(" .$row['id_viaje']. ")'>
                <span class='glyphicon glyphicon-trash'></span>
            </a>";
            
        } 
            
        $salida .= "
                </td>
            </tr>";
        }
    
        $salida .= "</tbody>
        </table>";
    
    echo $salida;
    
}