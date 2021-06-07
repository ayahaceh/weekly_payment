<?php
class Model_suplier extends CI_Model {

	
	public function getData()
	{
    	return $this->db->get("suplier")->result_array();
	}
	public function tambah_suplier()
	{
    	$data = array(
    		'nama_suplier' => $this->input->post('nama')
    	);
    	$this->db->insert('suplier',$data);
	}
	public function selectData($id)
	{
    	$this->db->where('id_suplier',$id);
    	return $this->db->get('suplier')->row_array();
	}
	public function edit_suplier()
	{
		$data = array(
    		'nama_suplier' => $this->input->post('nama')
    	);
    	$this->db->where('id_suplier',$this->input->post('id'));
    	$this->db->update('suplier',$data);
	}

}
