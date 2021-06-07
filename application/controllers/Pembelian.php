<?php
defined('BASEPATH') or exit('No direct script access allowed');


//load Spout Library
require_once(APPPATH . '/third_party/spout/src/Spout/Autoloader/autoload.php');

//lets Use the Spout Namespaces
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

class Pembelian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_pembelian');
		$this->load->model('Model_data_barang');
	}
	public function index()
	{
		$data['pembelian'] 	= $this->Model_pembelian->getData();
		$page 				= 'pembelian/v_pembelian_list';

		$this->template->load('template', $page, $data);
	}


	public function tambah_pembelian()
	{
		if ($this->input->post()) {
			$id	= $this->Model_pembelian->tambah_pembelian();
			redirect('pembelian/tambah_detail/' . $id);

			// $data['barang'] 		= $this->db->get('barang')->result_array();
			// $page 					= 'pembelian/v_pembelian_barang_add';

			// $this->template->load('template', $page, $data);
		}

		$data['suplier'] 	= $this->db->get('suplier')->result_array();
		$page 				= 'pembelian/v_pembelian_add';
		$this->template->load('template', $page, $data);
	}


	public function tambah_detail()
	{
		$id = $this->uri->segment(3);
		// var_dump($id);
		if ($this->input->post()) {
			$id = $this->Model_pembelian->tambah_detail();
			redirect('pembelian/tambah_detail/' . $id);
		}
		// Ambil data pembelian
		$data['pembelian']			= $this->Model_pembelian->selectDataPembelian($id);
		$data['pembelian_detail']	= $this->Model_pembelian->selectDataPembelianDetail($id);
		// var_dump($data['pembelian_detail']);
		$data['barang'] 			= $this->db->get('barang')->result_array();
		$data['id'] 				= $id;
		$page 						= 'pembelian/v_pembelian_barang_add';

		$this->template->load('template', $page, $data);
	}

	public function hapus_detail()
	{
		$id = $this->uri->segment(3);
		$id_detail = $this->uri->segment(4);
		$this->db->where('id', $id_detail);
		$this->db->delete('pembelian_detail');
		redirect('pembelian/tambah_detail/' . $id);
	}




	/// ------
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
		$get = $this->Model_pembelian->exportxcl();

		$writer = WriterFactory::create(Type::XLSX);
		//$writer = WriterFactory::create(Type::CSV); // for CSV files
		//$writer = WriterFactory::create(Type::ODS); // for ODS files

		//stream to browser
		$writer->openToBrowser("testing.xlsx");

		$header = [
			'No',
			'Tanggal',
			'Kode Faktur',
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
				$key->id,
				$key->kode_faktur,
				$key->tgl_pembelian,
				$key->nama_supplier,
				$key->Jumlah,
				$key->tgl_pengiriman,
				$key->alamat_pengiriman
			);
			array_push($data, $anggota); //masukkan variabel array anggota ke variabel array data
		}

		$writer->addRows($data); // add multiple rows at a time

		$writer->close();
	}
}
