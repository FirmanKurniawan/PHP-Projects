<?php
include '../koneksi.php';
include '../fpdf181/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage('P', 'A4');

$tgl = date('Y/m/d');
$pdf->Image('../images/logo-hotel.png', 10, 8, 20, 19);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(187, 6, 'HOTEL MURAH', 0, 1, 'C');
$pdf->setFont('Arial', 'B', 8);
$pdf->Cell(187, 6, 'Jl.Mangga No 11, Telp(001)345678', 0, 1, 'C');
$pdf->SetLineWidth(0.3);
$pdf->Line(10, 28, 200, 28);
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(187, 6, 'Laporan Pendapatan Sewa', 0, 1, 'C');
$pdf->Ln(1);
$pdf->setFont('Arial', 'B', 8);
$pdf->Cell(187, 4, 'Tanggal Cetak ' . $tgl, 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(192, 192, 192);
$pdf->Cell(8, 6, 'No', 1, 0, 'L', 1);
$pdf->Cell(20, 6, 'Tanggal', 1, 0, 'L', 1);
$pdf->Cell(132, 6, 'ID Transaksi', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Pendapatan Sewa', 1, 1, 'L', 1);

$nomor = 0;
$q_transaksi = mysqli_query($koneksi, "SELECT * FROM tbtransaksi ORDER BY idtransaksi DESC");
while ($r_transaksi = mysqli_fetch_array($q_transaksi)) {
    $nomor++;
    $pdf->Ln(0);
    $pdf->setFont('Arial', '', 7);
    $pdf->Cell(8, 4, $nomor, 1, 0, 'L');
    $pdf->Cell(20, 4, $r_transaksi['tglcheckin'], 1, 0, 'L');
    $pdf->Cell(132, 4, $r_transaksi['idtransaksi'], 1, 0, 'L');
    $pdf->Cell(30, 4, $r_transaksi['biaya'], 1, 1, 'R');
}
$q_total = mysqli_query($koneksi, "SELECT SUM(biaya)AS total FROM tbtransaksi");
$r_total = mysqli_fetch_array($q_total);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(160, 4, 'Total Pendapatan', 1, 0, 'R');
$pdf->Cell(30, 4, $r_total['total'], 1, 1, 'R');

$pdf->Output('cetak-pendapatan-sewa.pdf', 'I');
