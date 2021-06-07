<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepdf extends CI_Controller {

	public function index(){
			echo "behe";
	}
	public function export($id){
		$id = $this->uri->segment($id);
        echo $id;
	}
}
