<?php
require('../fpdf/fpdf.php');
// require('action.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,0,'Nominated Company/Institution/Individual',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

// $sql = "SELECT wapendekezwa.companyName,categories.name From categories,wapendekezanawapendekezwa,wapendekezwa WHERE categories.id = wapendekezanawapendekezwa.categoriesFK AND wapendekezwa.id = wapendekezanawapendekezwa.pendekezwaID";
// $results = $con->query($sql);

// $row = $result->fetch_object()
// while($row = $results->fetch_assoc()){
//   $id = $row['companyName'];
//   $name = $row['name'];
//   $pdf->Cell(50,10,$id,1);
//   $pdf->Cell(70,10,$name,1);
//   $pdf->Ln();
// }

// $pdf->Output();
?>