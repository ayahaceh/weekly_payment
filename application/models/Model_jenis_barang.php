<?php
class Model_jenis_barang extends CI_Model {

	
	public function getData()
	{
    	return $this->db->get("jenis_barang")->result_array();
	}
	public function tambah_jenis()
	{
    	$data = array(
    		'jenis_barang' => $this->input->post('jenis')
    	);
    	$this->db->insert('jenis_barang',$data);
	}
	public function selectData($id)
	{
    	$this->db->where('id_jenis',$id);
    	return $this->db->get('jenis_barang')->row_array();
	}
	public function edit_jenis()
	{
		$data = array(
    		'jenis_barang' => $this->input->post('jenis')
    	);
    	$this->db->where('id_jenis',$this->input->post('id'));
    	$this->db->update('jenis_barang',$data);
	}

}
