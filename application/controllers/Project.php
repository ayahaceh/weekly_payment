<?php
defined('BASEPATH') or exit('No direct script access allowed');


//load Spout Library
require_once(APPPATH . '/third_party/spout/src/Spout/Autoloader/autoload.php');

//lets Use the Spout Namespaces
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

class Project extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_project');
	}
	public function index()
	{
		$data['menu_project']       = true;
		$data['project'] = $this->Model_project->getData();
		$page 	= 'project/v_data_project_list';
		$this->template->load('template', $page, $data);
	}

	public function tambah_project()
	{
		if ($this->input->post()) {
			$this->Model_project->tambah_project();
			redirect('project');
		}
		$data['costumer'] = $this->db->get('costumer')->result_array();
		$page 	= 'project/v_project_add';

		$this->template->load('template', $page, $data);
	}

	public function edit_project()
	{
		if ($this->input->post()) {
			$this->Model_project->edit_project();
			redirect('project');
		}
		$id = $this->uri->segment(3);
		$data['project'] 	= $this->Model_project->selectData($id);
		$data['costumer'] 	= $this->db->get('costumer')->result_array();
		$page 	= 'project/v_project_edit';

		$this->template->load('template', $page, $data);
	}
	public function delete_project($id)
	{
		$this->db->where('id_project', $id);
		$this->db->delete('project');
		redirect('project');
	}
	public function view_project($id)
	{
		$data['project'] = $this->Model_project->detaildata($id);
		$this->template->load('template', 'detail_project', $data);
	}
	public function exportexcel()
	{
		//$get = $this->db->get('project'); //ambil data dari db
		$get = $this->Model_data_project->exportxcl();

		$writer = WriterFactory::create(Type::XLSX);
		//$writer = WriterFactory::create(Type::CSV); // for CSV files
		//$writer = WriterFactory::create(Type::ODS); // for ODS files

		//stream to browser
		$writer->openToBrowser("testing.xlsx");

		$header = [
			'No',
			'Foto',
			'Nama project',
			'Jenis project',
			'Suplier',
			'Modal',
			'Harga Jual',
			'Stok project'
		];
		$writer->addRow($header); // add a row at a time
		$data   = array(); //siapkan variabel array untuk menampung data
		$no = 1;
		foreach ($get->result() as $key) {
			$anggota    = array(
				$no++,
				$key->foto,
				$key->nama,
				$key->jenis_project,
				$key->nama_suplier,
				$key->modal,
				$key->harga,
				$key->stok_project
			);
			array_push($data, $anggota); //masukkan variabel array anggota ke variabel array data
		}

		$writer->addRows($data); // add multiple rows at a time

		$writer->close();
	}
}
