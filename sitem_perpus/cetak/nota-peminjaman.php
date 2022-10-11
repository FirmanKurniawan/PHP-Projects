<?php
include'../koneksi.php';
include'../fpdf181/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage('P','A4');

$tgl=date('Y/m/d');			
$pdf->Rect(8,6,194,60);
$pdf->Image('../images/logo-perpustakaan.png',10,8,20,19);
$pdf->setFont('Arial','B',12);
$pdf->Cell(187,6,'PERPUSTAKAAN UMUM',0,1,'C');
$pdf->setFont('Arial','B',8);
$pdf->Cell(187,6,'Jl.Apel No 11, Telp(001)345678',0,1,'C');
$pdf->SetLineWidth(0.3);
$pdf->Line(10,28,200,28);
$pdf->setFont('Arial','B',10);
$pdf->Cell(187,6,'Nota Peminjaman Buku',0,1,'C');
$pdf->Ln(2);	
$pdf->SetLineWidth(0.3);
$pdf->Line(10,34,200,34);	
$pdf->setFont('Arial','B',8);
$pdf->Cell(187,4,'Tanggal Cetak '.$tgl,0,0,'C');
$pdf->Ln(6);

$id_transaksi=$_GET['id'];
$nomor=0;
$q_nota_peminjaman=mysqli_query($koneksi,
	"SELECT tbtransaksi.*,tbanggota.*,tbbuku.*
	FROM tbtransaksi,tbanggota,tbbuku
	WHERE tbtransaksi.idanggota=tbanggota.idanggota
	AND tbtransaksi.idbuku=tbbuku.idbuku
	AND tbtransaksi.idtransaksi='$id_transaksi'"
);
while($r_nota_peminjaman=mysqli_fetch_array($q_nota_peminjaman)){
	$nomor++;
	$pdf->Ln(0);
	$pdf->setFont('Arial','',10);
	$pdf->Cell(25,5,'ID Transaksi',0,0,'L');
	$pdf->Cell(60,5,': '.$r_nota_peminjaman['idtransaksi'],0,0,'L');
	$pdf->Cell(25,5,'Tanggal Pinjam',0,0,'L');
	$pdf->Cell(86,5,': '.$r_nota_peminjaman['tglpinjam'],0,1,'L');
	$pdf->Cell(25,5,'ID Anggota',0,0,'L');
	$pdf->Cell(60,5,': '.$r_nota_peminjaman['idanggota'],0,0,'L');
	$pdf->Cell(25,5,'ID Buku',0,0,'L');
	$pdf->Cell(86,5,': '.$r_nota_peminjaman['idbuku'],0,1,'L');
	$pdf->Cell(25,5,'Nama',0,0,'L');
	$pdf->Cell(60,5,': '.$r_nota_peminjaman['nama'],0,0,'L');
	$pdf->Cell(25,5,'Judul Buku',0,0,'L');
	$pdf->Cell(86,5,': '.$r_nota_peminjaman['judulbuku'],0,1,'L');
	$pdf->SetLineWidth(0.3);
	$pdf->Line(10,58,200,58);
}
$pdf->Ln(8);
$pdf->Cell(187,6,'TERIMA KASIH TELAH BERKUNJUNG',0,1,'C');

$pdf->Output('nota-peminjaman.pdf','I');
