<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_jenis_barang');
	}
	public function index()
	{
		$data['jenis'] = $this->Model_jenis_barang->getData();
		$this->template->load('template','jenis_barang',$data);
	}
	public function add_jenis_barang()
	{	
		if($this->input->post())
    	{
           $this->Model_jenis_barang->tambah_jenis();
           redirect('jenis_barang');
    	}
		$this->template->load('template','tambah_jenis');
	}
	public function edit_jenis_barang($id)
	{	
		if($this->input->post())
    	{
           $this->Model_jenis_barang->edit_jenis();
           redirect('jenis_barang');
    	}
		$data['jenis'] = $this->Model_jenis_barang->selectData($id);
		$this->template->load('template','edit_jenis_barang',$data);
	}
	public function delete_jenis_barang($id)
	{
		$this->db->where('id_jenis',$id);
		$this->db->delete('jenis_barang');
		redirect('jenis_barang');
	}

}
