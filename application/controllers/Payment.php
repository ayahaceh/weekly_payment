<?php
defined('BASEPATH') or exit('No direct script access allowed');


//load Spout Library
require_once(APPPATH . '/third_party/spout/src/Spout/Autoloader/autoload.php');

//lets Use the Spout Namespaces
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

class Payment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pemakaian');
        $this->load->model('Model_payment');
        $this->load->model('Model_project');
        // $menu_transaksi = true;
    }

    public function index()
    {
        // Menu
        $data['menu_project']       = true;
        $data['menu_project_list']  = true;
        $data['project']    = $this->Model_project->getData();

        $page               = 'payment/v_weekly';
        $this->template->load('template', $page, $data);
    }

    public function mingguan()
    {
        if ($this->input->post()) {
            $id_project         = $this->input->post('id_project');
            $minggu             = $this->input->post('minggu');
            $data['mingguan']   = $this->Model_payment->mingguan($id_project, $minggu);
            $id                 = $id_project;
            $data['project']    = $this->Model_project->selectData($id);
            $data['tanggal']    = date("Y/m/d");
            $data['week']       = $minggu;

            $data['menu_project']       = true;
            $data['menu_project_list']  = true;

            $page               = 'payment/weekly_payment';
            $this->template->load('template', $page, $data);
        }
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
