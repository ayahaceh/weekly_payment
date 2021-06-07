<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		//$data['jenis'] = $this->Model_jenis_barang->getData();

		$this->load->view('login');
	}

	public function proses(){
		if($this->input->post())
		{
	        $username   = $this->input->post('username');
			$password   = $this->input->post('password');
			
			$user = $this->db->get_where('user',array('uname'=>$username,'pass'=>$password))->num_rows();
			$id_user = $this->db->get_where('user',array('uname'=>$username))->row();
	        if($user == 1)
	        {
	            $_SESSION['username']= $username;
	            $_SESSION['id_user']= $id_user->id_user;
	            $_SESSION['foto']= $id_user->foto;
	            $_SESSION['status']= $id_user->status;
				if($_SESSION['status']==1){	
					redirect('dashboard');
				}else{
					redirect('user');
				}
	        }else{
				$this->session->set_flashdata('gagal','Username atau Password salah');
				redirect('login');
			}
	    }
	}

	public function logout()
	{
   		 $this->session->sess_destroy();
    	 redirect('login');
	}

}
