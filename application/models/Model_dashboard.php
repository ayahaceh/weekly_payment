<?php
class Model_dashboard extends CI_Model {

	
	public function barang()
	{
    	return $this->db->get("barang")->num_rows();
    }
    public function transaksi()
	{
    	return $this->db->get("transaksi")->num_rows();
    }
    public function user()
	{
    	return $this->db->get("user")->num_rows();
    }
    public function admin()
	{
    	return $this->db->get_where("user",array('status'=>1))->num_rows();
    }
}