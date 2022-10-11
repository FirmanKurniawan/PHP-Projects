<?php
include'../koneksi.php';
include'../fpdf181/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage('P','A4');

$tgl=date('Y/m/d');
$pdf->Image('../images/logo-hotel.png',10,8,20,19);
$pdf->setFont('Arial','B',12);
$pdf->Cell(187,6,'HOTEL MURAH',0,1,'C');
$pdf->setFont('Arial','B',8);
$pdf->Cell(187,6,'Jl.Mangga No 11, Telp(001)345678',0,1,'C');
$pdf->SetLineWidth(0.3);
$pdf->Line(10,28,200,28);
$pdf->setFont('Arial','B',10);
$pdf->Cell(187,6,'Laporan Data Kamar',0,1,'C');
$pdf->Ln(1);		
$pdf->setFont('Arial','B',8);
$pdf->Cell(187,4,'Tanggal Cetak '.$tgl,0,1,'C');

$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(192,192,192);
$pdf->Cell(8,6,'No',1,0,'L',1);
$pdf->Cell(22,6,'Nomor Kamar',1,0,'L',1);
$pdf->Cell(36,6,'Jenis Kamar',1,0,'L',1);
$pdf->Cell(102,6,'Fasilitas',1,0,'L',1);
$pdf->Cell(22,6,'Tarif Kamar',1,1,'L',1);

$nomor=0;
$q_kamar=mysqli_query(
    $koneksi,
	"SELECT * FROM tbkamar"
);
while($r_kamar=mysqli_fetch_array($q_kamar)){
	$nomor++;
	$pdf->Ln(0);
	$pdf->setFont('Arial','',7);
	$pdf->Cell(8,4,$nomor,1,0,'L');
	$pdf->Cell(22,4,$r_kamar['nomorkamar'],1,0,'L');
	$pdf->Cell(36,4,$r_kamar['jeniskamar'],1,0,'L');
	$pdf->Cell(102,4,$r_kamar['fasilitas'],1,0,'L');
	$pdf->Cell(22,4,$r_kamar['tarif'],1,1,'R');
}	
$pdf->Output('cetak-kamar.pdf','I');
