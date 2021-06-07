<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->template->load('template','konten');
	}
	public function data_barang()
	{
		$this->template->load('template','data_barang');
	}
	public function jenis_barang()
	{
		$this->template->load('template','jenis_barang');
	}
	public function penjualan()
	{
		$this->template->load('template','penjualan');
	}
	public function profile()
	{
		$this->template->load('template','profile');
	}
	public function suplier()
	{
		$this->template->load('template','suplier');
	}

}
