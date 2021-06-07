<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_suplier');
	}
	public function index()
	{
		$data['suplier'] = $this->Model_suplier->getData();
		$this->template->load('template','suplier',$data);
	}
	public function add_suplier()
	{	
		if($this->input->post())
    	{
           $this->Model_suplier->tambah_suplier();
           redirect('suplier');
    	}
		$this->template->load('template','tambah_suplier');
	}
	public function edit_suplier($id)
	{	
		if($this->input->post())
    	{
           $this->Model_suplier->edit_suplier();
           redirect('suplier');
    	}
		$data['suplier'] = $this->Model_suplier->selectData($id);
		$this->template->load('template','edit_suplier',$data);
	}
	public function delete_suplier($id)
	{
		$this->db->where('id_suplier',$id);
		$this->db->delete('suplier');
		redirect('suplier');
	}

}
