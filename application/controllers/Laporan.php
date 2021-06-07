<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_laporan');
	}
	public function index()
	{
		$data['laporan'] = $this->Model_laporan->getData();
		$data['tanggal'] = $this->Model_laporan->getTanggal();
		$this->template->load('template','laporan',$data);
    }
    public function edit()
    {
        $this->Model_laporan->edit();
        redirect('laporan');
    }

}