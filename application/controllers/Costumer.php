<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Costumer extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_costumer');
		//$this->load->library('Pdf/Fpdf.php');
	}
	public function index()
	{
		$data['barang'] = $this->Model_costumer->getData();
		$this->template->load('template', 'costumer', $data);
	}
	public function tambah_costumer()
	{
		if ($this->input->post()) {
			$this->Model_costumer->tambah_costumer();
			redirect('costumer');
		}
		$this->template->load('template', 'tambah_costumer');
	}
	public function edit_costumer()
	{
		if ($this->input->post()) {
			$this->Model_costumer->edit_costumer();
			redirect('costumer');
		}
		$id = $this->uri->segment(3);
		$data['barang'] = $this->Model_costumer->selectData($id);
		$this->template->load('template', 'edit_costumer', $data);
	}
	public function delete_costumer($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
		redirect('costumer');
	}
	public function view_costumer($id)
	{
		$data['id'] = $id;
		$data['costumer'] = $this->Model_costumer->detailcostumer($id);
		$this->template->load('template', 'detail_costumer', $data);
	}
	public function exportpdf($id)
	{
		//required('pdf/fpdf.php');
		//require_once(APPPATH.'pdf/fpdf.php');

		$pdf = new FPDF("L", "cm", "A4");

		$pdf->SetMargins(2, 1, 1);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times', 'B', 11);
		$pdf->Image(base_url('uploads/avatar.png'), 1, 1, 2, 2);
		$pdf->SetX(4);
		$pdf->MultiCell(19.5, 0.5, 'APLIKASI POINT OF SALE', 0, 'L');
		$pdf->SetX(4);
		$pdf->MultiCell(19.5, 0.5, 'Telpn : +6278664569', 0, 'L');
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->SetX(4);
		$pdf->MultiCell(19.5, 0.5, 'Jln.Prabu Sliwangi', 0, 'L');
		$pdf->SetX(4);
		$pdf->MultiCell(19.5, 0.5, 'E-mail : umam@kontak.com', 0, 'L');
		$pdf->Line(1, 3.1, 28.5, 3.1);
		$pdf->SetLineWidth(0.1);
		$pdf->Line(1, 3.2, 28.5, 3.2);
		$pdf->SetLineWidth(0);
		$pdf->ln(1);
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Cell(25.5, 0.7, "Detail Transaksi Costumer", 0, 10, 'C');
		$pdf->ln(1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(5, 0.7, "Di cetak pada : " . date("D-d/m/Y"), 0, 0, 'C');
		$pdf->ln(1);
		$pdf->SetFont('Arial', 'B', 10);
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
		$pdf->SetFont('Arial', '', 10);
		$no = 1;
		$lihat = $this->db->query("SELECT barang.nama, barang.id_jenis, barang.id_suplier, barang.modal, barang.harga, user.uname, jenis_barang.jenis_barang, suplier.nama_suplier, transaksi.* FROM transaksi transaksi INNER JOIN jenis_barang jenis_barang ON transaksi.id_jenis = jenis_barang.id_jenis INNER JOIN suplier suplier ON transaksi.id_suplier = suplier.id_suplier INNER JOIN barang barang ON transaksi.id_barang = barang.id_barang INNER JOIN user user ON transaksi.id_user = user.id_user WHERE transaksi.id_user='$id'")->result_array();
		foreach ($lihat as $k) {
			$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
			$pdf->Cell(2, 0.8, $k["kode_transaksi"], 1, 0, 'C');
			$pdf->Cell(2, 0.8, $k["tanggal"], 1, 0, 'C');
			$pdf->Cell(2, 0.8, $k["uname"], 1, 0, 'C');
			$pdf->Cell(3, 0.8, $k["nama"], 1, 0, 'C');
			$pdf->Cell(3, 0.8, $k["jenis_barang"], 1, 0, 'C');
			$pdf->Cell(2, 0.8, $k["nama_suplier"], 1, 0, 'C');
			$pdf->Cell(3, 0.8, $k["jumlah"], 1, 0, 'C');
			$pdf->Cell(3, 0.8, $k["harga"], 1, 0, 'C');
			$pdf->Cell(3, 0.8, $k["total_harga"], 1, 0, 'C');
			$pdf->Cell(2, 0.8, $k["laba"], 1, 1, 'C');

			$no++;
		}
		//$total_semua = 0;
		//while($lihat){
		//$potongan = ($lihat["harga_jual"] * $lihat["berat"]) * ($lihat["potongan"] / 100);
		//$total = ($lihat["harga_jual"] * $lihat["berat"]) - $potongan;
		//$total_semua += $total;
		// if ($total >= 100000){
		// 	$bonus = "Topi";
		// } else {
		// 	$bonus = "Sepatu";
		// }


		//}

		//   $pdf->Cell(15, 0.8, 'Grand Total', 1, 0, 'C');
		//   $pdf->Cell(8, 0.8, rupiah($total_semua), 1, 0, 'C');

		$pdf->Output("laporan_buku.pdf", "I");
	}
}
