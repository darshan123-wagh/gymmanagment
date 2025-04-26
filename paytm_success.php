<?php
require('fpdf/fpdf.php');

$email = $_POST['email'];
$amount = $_POST['amount'];
$plan = $_POST['plan'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$A_date = $_POST['A_date'];
$e_date = $_POST['e_date'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, 'Gym Membership Receipt', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Name:', 0, 0);
$pdf->Cell(0, 10, $name, 0, 1);
$pdf->Cell(50, 10, 'Email:', 0, 0);
$pdf->Cell(0, 10, $email, 0, 1);
$pdf->Cell(50, 10, 'Phone:', 0, 0);
$pdf->Cell(0, 10, $phone, 0, 1);
$pdf->Ln(10);


$pdf->Cell(50, 10, 'Plan:', 0, 0);
$pdf->Cell(0, 10, $plan, 0, 1);
$pdf->Cell(50, 10, 'Amount:', 0, 0);
$pdf->Cell(0, 10, '₹' . $amount, 0, 1);
$pdf->Cell(50, 10, 'Activation Date:', 0, 0);
$pdf->Cell(0, 10, $A_date, 0, 1);
$pdf->Cell(50, 10, 'Expiry Date:', 0, 0);
$pdf->Cell(0, 10, $e_date, 0, 1);
$pdf->Ln(10);

$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0, 10, 'Thank you for choosing our gym! you have go to gym and show this recipt and pay the amount', 0, 1, 'C');

$pdf->Output('D', 'Gym_Receipt.pdf');
?>