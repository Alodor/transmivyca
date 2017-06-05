<?php
include 'session.php';
include_once '../libs/plantilla.php';
require_once '../models/class.mantenimiento.php';

$listar = new Mantenimiento();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Cell(200,30, 'Listado de Chutos en Mantenimiento',0,0,'C');
$pdf->Ln(25); // Espaciado de lineas
$pdf->SetFillColor(112,186,255); // Color azul de la franja
$pdf->SetTextColor(240, 255, 240); // Color blanco del texto de la franja
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,10,'Id',1,0,'C',1);
$pdf->Cell(30,10,utf8_decode('Matrícula'),1,0,'C',1);
$pdf->Cell(30,10,'Kilometraje',1,0,'C',1);
$pdf->Cell(35,10,'Falla',1,0,'C',1);
$pdf->Cell(47,10,'Tipo Mantenimiento',1,0,'C',1);
$pdf->Cell(33,10,'Fecha Ingreso',1,1,'C',1);

$pdf->SetFont('Arial','',10);

// Ejecutar script Listar
$data = $listar->Listar();

// Realiza recorrido de la tabla
foreach ($data as $key => $valor) {
    
    $pdf->SetTextColor(3, 3, 3);
    $pdf->Cell(15,10,$valor['id_mantenimiento'],1,0,'C');
    $pdf->Cell(30,10,$valor['matricula_chuto'],1,0,'C');
    $pdf->Cell(30,10,$valor['kilometraje'],1,0,'C');
    $pdf->Cell(35,10,utf8_decode($valor['falla']),1,0,'C');
    $pdf->Cell(47,10,utf8_decode($valor['tipo_mantenimiento']),1,0,'C');
    $pdf->Cell(33,10,$valor['fecha_ingreso'],1,1,'C');
}

$pdf->Output();