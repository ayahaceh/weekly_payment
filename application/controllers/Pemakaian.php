<?php
defined('BASEPATH') or exit('No direct script access allowed');


//load Spout Library
require_once(APPPATH . '/third_party/spout/src/Spout/Autoloader/autoload.php');

//lets Use the Spout Namespaces
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

class Pemakaian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_pemakaian');
		$this->load->model('Model_data_project');
	}
	public function index()
	{
		$data['project'] = $this->Model_data_project->getData();
		// $data['tanggal'] = $this->Model_pemakaian->getTanggal();
		$this->template->load('template', 'pemakaian/v_pemakaian_list', $data);
	}

	public function tambah()
	{
		if ($this->input->post()) {
			$this->Model_pemakaian->tambah_pemakaian();
			redirect('pemakaian');
		}
		$id = $this->uri->segment(3);
		$data['barang'] = $this->db->get('barang')->result_array();
		$this->template->load('template', 'tambah_pemakaian', $data);
	}








	public function tambah_pemakaian()
	{
		if ($this->input->post()) {
			$this->Model_pemakaian->tambah_pemakaian();
			redirect('pemakaian');
		}
		$data['barang'] = $this->db->get('barang')->result_array();
		$this->template->load('template', 'tambah_pemakaian', $data);
	}
	public function edit_pemakaian()
	{
		if ($this->input->post()) {
			$this->Model_pemakaian->edit_pemakaian();
			redirect('pemakaian');
		}
		$id = $this->uri->segment(3);
		$data['pemakaian'] = $this->Model_pemakaian->selectData($id);
		$data['barang'] = $this->db->get('barang')->result_array();
		$this->template->load('template', 'edit_pemakaian', $data);
	}
	public function delete_pemakaian($id)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->delete('transaksi');
		redirect('pemakaian');
	}
	public function exportexcel($tanggal = null)
	{
		//$get = $this->db->get('barang'); //ambil data dari db
		$get = $this->Model_pemakaian->exportxcl($tanggal);

		$writer = WriterFactory::create(Type::XLSX);
		//$writer = WriterFactory::create(Type::CSV); // for CSV files
		//$writer = WriterFactory::create(Type::ODS); // for ODS files

		//stream to browser
		$writer->openToBrowser("testing.xlsx");

		$header = [
			'No',
			'Kode',
			'Tanggal',
			'Nama',
			'Barang',
			'Jenis Barang',
			'Suplier',
			'Jumlah',
			'Harga Jual',
			'Total',
			'Laba'
		];
		$writer->addRow($header); // add a row at a time
		$data   = array(); //siapkan variabel array untuk menampung data
		$no = 1;
		foreach ($get->result() as $key) {
			$anggota    = array(
				$no++,
				$key->kode_transaksi,
				$key->tanggal,
				$key->uname,
				$key->nama,
				$key->jenis_barang,
				$key->nama_suplier,
				$key->jumlah,
				$key->harga,
				$key->total_harga,
				$key->laba
			);
			array_push($data, $anggota); //masukkan variabel array anggota ke variabel array data
		}

		$writer->addRows($data); // add multiple rows at a time

		$writer->close();
	}
}
