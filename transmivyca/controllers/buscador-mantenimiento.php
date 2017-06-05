<?php
session_start();
require_once '../models/class.mantenimiento.php';

$listar = new Mantenimiento();
$valor = $_POST['consulta'];

$salida = "";

if (isset($valor)) {
    $data = $listar->Buscar($valor);
    
    $salida .= "
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Matrícula</th>
                <th>Kilometraje</th>
                <th>Falla</th>
                <th>Tipo Mantenimiento</th>
                <th>Fecha Ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody class='text-center'>";
    
        foreach ($data as $row) {
        
        $salida .= "
            <tr>
                <td>" .$row['id_mantenimiento']. "</td>
                <td>" .$row['matricula_chuto']. "</td>
                <td>" .$row['kilometraje']. "</td>
                <td>" .$row['falla']. "</td>
                <td>" .$row['tipo_mantenimiento']. "</td>
                <td>" .$row['fecha_ingreso']. "</td>
                <td>";
                                       
        if ($_SESSION['privilegio'] == "administrador") {
            
        $salida .= "                                
            <a class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Eliminar' onclick='eliminarMantenimiento(" .$row['id_mantenimiento']. ")'>
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