<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_dashboard');
	}
    public function index()
    {   
        $data['barang'] = $this->Model_dashboard->barang();
        $data['transaksi'] = $this->Model_dashboard->transaksi();
        $data['user'] = $this->Model_dashboard->user();
        $data['admin'] = $this->Model_dashboard->admin();
		$this->template->load('template','dashboard',$data);
    }
}
