<?php
defined('BASEPATH') or exit('No direct script access allowed');


//load Spout Library
require_once(APPPATH . '/third_party/spout/src/Spout/Autoloader/autoload.php');

//lets Use the Spout Namespaces
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

class Data_barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_data_barang');
	}
	public function index()
	{
		$data['barang'] = $this->Model_data_barang->getData();
		$this->template->load('template', 'data_barang', $data);
	}
	public function tambah_barang()
	{
		if ($this->input->post()) {
			$this->Model_data_barang->tambah_barang();
			redirect('data_barang');
		}
		$data['jenis'] = $this->db->get('jenis_barang')->result_array();
		$data['suplier'] = $this->db->get('suplier')->result_array();
		// $data['satuan'] = $this->db->get('satuan')->result_array();
		$this->template->load('template', 'tambah_barang', $data);
	}
	public function edit_data_barang()
	{
		if ($this->input->post()) {
			$this->Model_data_barang->edit_barang();
			redirect('data_barang');
		}
		$id = $this->uri->segment(3);
		$data['barang'] = $this->Model_data_barang->selectData($id);
		$data['jenis'] = $this->db->get('jenis_barang')->result_array();
		$data['suplier'] = $this->db->get('suplier')->result_array();
		// $data['satuan'] = $this->db->get('satuan')->result_array();
		$this->template->load('template', 'edit_data_barang', $data);
	}
	public function delete_data_barang($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('barang');
		redirect('data_barang');
	}
	public function view_data_barang($id)
	{
		$data['barang'] = $this->Model_data_barang->detaildata($id);
		$this->template->load('template', 'detail_data_barang', $data);
	}
	public function exportexcel()
	{
		//$get = $this->db->get('barang'); //ambil data dari db
		$get = $this->Model_data_barang->exportxcl();

		$writer = WriterFactory::create(Type::XLSX);
		//$writer = WriterFactory::create(Type::CSV); // for CSV files
		//$writer = WriterFactory::create(Type::ODS); // for ODS files

		//stream to browser
		$writer->openToBrowser("testing.xlsx");

		$header = [
			'No',
			'Foto',
			'Nama Barang',
			'Jenis Barang',
			'Suplier',
			'Modal',
			'Harga Jual',
			'Stok Barang'
		];
		$writer->addRow($header); // add a row at a time
		$data   = array(); //siapkan variabel array untuk menampung data
		$no = 1;
		foreach ($get->result() as $key) {
			$anggota    = array(
				$no++,
				$key->foto,
				$key->nama,
				$key->jenis_barang,
				$key->nama_suplier,
				$key->modal,
				$key->harga,
				$key->stok_barang
			);
			array_push($data, $anggota); //masukkan variabel array anggota ke variabel array data
		}

		$writer->addRows($data); // add multiple rows at a time

		$writer->close();
	}
}
