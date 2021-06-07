<?php
class Model_weekly_payment extends CI_Model {

	
	public function getData()
	{
    	return $this->db->get("suplier")->result_array();
	}

	public function selectData($id)
	{
    	$this->db->where('id_suplier',$id);
    	return $this->db->get('suplier')->row_array();
	}


}
