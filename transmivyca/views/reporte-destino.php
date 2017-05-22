<?php
include 'session.php';
include_once '../libs/plantilla.php';
require_once '../models/class.destino.php';

$listar = new Destino();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Cell(200,30, 'Listado de Destinos',0,0,'C');
$pdf->Ln(25); // Espaciado de lineas
$pdf->SetFillColor(112,186,255); // Color azul de la franja
$pdf->SetTextColor(240, 255, 240); // Color blanco del texto de la franja
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,10,'Id',1,0,'C',1);
$pdf->Cell(75,10,'Destino',1,0,'C',1);
$pdf->Cell(50,10,'Distancia Km',1,0,'C',1);
$pdf->Cell(50,10,utf8_decode('Viáticos'),1,1,'C',1);

$pdf->SetFont('Arial','',10);

// Ejecutar script Listar
$data = $listar->Listar();

// Realiza recorrido de la tabla
foreach ($data as $key => $valor) {
    
    $pdf->SetTextColor(3, 3, 3);
    $pdf->Cell(15,10,$valor['id_destino'],1,0,'C');
    $pdf->Cell(75,10,utf8_decode($valor['destino']),1,0,'C');
    $pdf->Cell(50,10,$valor['distancia'],1,1,'C');
}

$pdf->Output();