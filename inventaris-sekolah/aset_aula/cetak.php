<?php

include("../status_login.php");

// memanggil library FPDF
require('../fpdf182/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L','mm','A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->SetTitle('Laporan Daftar Aset Aula');

// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Image('../assets/logo-black.png',10,10);
$pdf->Cell(8);
$pdf->Cell('',7,'Inventaris Aset Sekolah',0,1);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell('',7,'SEKOLAH MENENGAH KEJURUAN',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell('',7,'Laporan Daftar Aset Aula',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(27,6,'Nama Aset',1,0);
$pdf->Cell(10,6,'Qty',1,0,'C');
$pdf->Cell(27,6,'Harga',1,0);
$pdf->Cell(35,6,'Tanggal Pembelian',1,0);
$pdf->Cell(37,6,'Penanggung Jawab',1,0);
$pdf->Cell(35,6,'Nama Pemeriksa',1,0);
$pdf->Cell(35,6,'Tanggal Diperiksa',1,0);
$pdf->Cell(63,6,'Catatan',1,1);

$pdf->SetFont('Arial','',10);

include '../function/rupiah.php';
include '../koneksi.php';
$result = mysqli_query($db, "SELECT * FROM aset_aula");
$no = 1;
foreach($result as $row){
	$pdf->Cell(8,6,$no++,1,0,'C');
    $pdf->Cell(27,6,$row['nama_aset'],1,0);
    $pdf->Cell(10,6,$row['kuantitas'],1,0,'C');
    $pdf->Cell(27,6,harga($row['harga']),1,0);
    $pdf->Cell(35,6,$row['tgl_pembelian'],1,0); 
    $pdf->Cell(37,6,$row['penanggung_jawab'],1,0);
    $pdf->Cell(35,6,$row['nama_pemeriksa'],1,0);
    $pdf->Cell(35,6,$row['tgl_diperiksa'],1,0);
    $pdf->Cell(63,6,$row['catatan'],1,1);
}

$pdf->SetFont('Arial','',10);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(258,6,'Laporan ini dicetak pada : ',0,0,'R');
$pdf->Cell('',6,date('d-m-Y'),0,1,'R');

ob_start(); 

$pdf->Output();

?>