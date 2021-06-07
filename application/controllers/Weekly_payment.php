<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Weekly_payment extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_weekly_payment');
	}

	public function index()
	{
		//$data['laporan'] = $this->Model_laporan->getData();
		//$data['tanggal'] = $this->Model_laporan->getTanggal();
		$data = "Ujicoba";
		$this->template->load('template', 'payment/weekly_payment', $data);
	}

	public function edit()
	{
		$this->Model_laporan->edit();
		redirect('laporan');
	}
}
