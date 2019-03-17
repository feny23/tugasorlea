<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'KEDAI KELONTONG X',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Data Penjualan Barang',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'Tanggal',1,0);
$pdf->Cell(27,6,'Barang',1,0);
$pdf->Cell(25,6,'Harga',1,0);
$pdf->Cell(25,6,'Jumlah',1,0);
$pdf->Cell(25,6,'Total',1,0);
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','',10);

include 'koneksi.php';
$mahasiswa = mysqli_query($connect, "SELECT penjualan.tanggal,barang.nama,barang.harga_jual,penjualan.jmlh,penjualan.total FROM penjualan JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan JOIN barang ON barang.id_barang=penjualan.id_barang WHERE penjualan.ket='Lunas'");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(20,6,$row['tanggal'],1,0);
    $pdf->Cell(27,6,$row['nama'],1,0);
    $pdf->Cell(25,6,$row['harga_jual'],1,0);
     $pdf->Cell(25,6,$row['jmlh'],1,0); 
      $pdf->Cell(25,6,$row['total'],1,0);  
      $pdf->Cell(10,7,'',0,1);
}

$pdf->Output();
?>