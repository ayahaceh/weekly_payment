<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_user');
	}
    public function index()
    {   
        if($this->input->post())
    	{
           $this->Model_user->beli_barang();
           redirect('user');
        }
        $id = $_SESSION['id_user'];
        $data['jenis'] = $this->Model_user->jenis();
        $data['cart'] = $this->Model_user->detail($id);
        $data['barang'] = $this->Model_user->getData();
		$this->template->load('template_user','konten',$data);
    }
    public function cart()
	{
        $id = $_SESSION['id_user'];
        $data['isicart'] = $this->Model_user->isicart($id);
        $data['cart'] = $this->Model_user->detail($id);
		$this->template->load('template_user','isicart',$data);
	}
    public function logout()
	{
   		 $this->session->sess_destroy();
    	 redirect('login');
	}
}