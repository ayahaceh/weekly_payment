<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/////////////////////////////////////
require('pdf/fpdf.php');



$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image(base_url('uploads/avatar.png'),1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'FIJRI MOTOR GALLERY',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 081384582099',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL.SAMA KAMU',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'email : vjpanda10@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Barang",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Kode', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Nama', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jenis Barang', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Suplier', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jumlah', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Harga Jual', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Total', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Laba', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysql_query("SELECT barang.nama, barang.id_jenis, barang.id_suplier, barang.modal, barang.harga, user.uname, jenis_barang.jenis_barang, suplier.nama_suplier, transaksi.* FROM transaksi transaksi INNER JOIN jenis_barang jenis_barang ON transaksi.id_jenis = jenis_barang.id_jenis INNER JOIN suplier suplier ON transaksi.id_suplier = suplier.id_suplier INNER JOIN barang barang ON transaksi.id_barang = barang.id_barang INNER JOIN user user ON transaksi.id_user = user.id_user WHERE transaksi.id_user='$id'");
    
//$total_semua = 0;
while($lihat=mysql_fetch_array($query)){
    $potongan = ($lihat["harga_jual"] * $lihat["berat"]) * ($lihat["potongan"] / 100);
    $total = ($lihat["harga_jual"] * $lihat["berat"]) - $potongan;
    $total_semua += $total;
        if ($total >= 100000){
            $bonus = "Topi";
        } else {
            $bonus = "Sepatu";
        }
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(2, 0.8, tgl_indo($lihat["tanggal_transaksi"]),1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['nama_petani'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['alamat_petani'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['jenis_sawit'], 1, 0,'C');
    $pdf->Cell(3, 0.8, rupiah($lihat["harga_jual"]),1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['berat'], 1, 0,'C');
	$pdf->Cell(3, 0.8, rupiah($potongan), 1, 0,'C');
	$pdf->Cell(3, 0.8, rupiah($total), 1, 0,'C');
	$pdf->Cell(2, 0.8, $bonus, 1, 1,'C');

    $no++;
    
}

 //   $pdf->Cell(15, 0.8, 'Grand Total', 1, 0, 'C');
 //   $pdf->Cell(8, 0.8, rupiah($total_semua), 1, 0, 'C');

    $pdf->Output("laporan_buku.pdf","I");
?>

