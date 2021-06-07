<?php
defined('BASEPATH') or exit('No direct script access allowed');


//load Spout Library
require_once(APPPATH . '/third_party/spout/src/Spout/Autoloader/autoload.php');

//lets Use the Spout Namespaces
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pemakaian');
        // $this->load->model('Model_pembayaran');
        $this->load->model('Model_project');
        // $menu_transaksi = true;

    }
    public function index()
    {
        $data['project']    = $this->Model_project->getData();
        // Menu
        $data['menu_project']       = true;
        $data['menu_project_list']  = true;

        $page               = 'transaksi/v_transaksi_list';
        $this->template->load('template', $page, $data);
    }

    public function pemakaian()
    {
        // Ambil id Project, data_pemakaian by id_project
        $id                 = $this->uri->segment(3);
        $data['pemakaian']  = $this->Model_pemakaian->selectData($id);
        $data['project']    = $this->Model_project->selectData($id);
        // var_dump($id);
        // var_dump($data['pemakaian']);
        $page               = 'transaksi/v_pemakaian';
        $this->template->load('template', $page, $data);
    }

    public function tambah_pemakaian()
    {
        $id = $this->uri->segment(3);

        if ($this->input->post()) {
            $id_pemakaian = $this->Model_pemakaian->tambah_pemakaian();
            redirect('transaksi/pemakaian/' . $id_pemakaian);
        }

        $data['project']    = $this->Model_project->selectData($id);
        $data['barang']     = $this->db->get('barang')->result_array();

        $page               = 'transaksi/v_pemakaian_add';
        $this->template->load('template', $page, $data);
    }





    //---
}
