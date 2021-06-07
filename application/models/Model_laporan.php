<?php
class Model_laporan extends CI_Model {

	
	public function getData()
	{	
		if($this->input->post()){
			$tanggal = $this->input->post('tanggal');
			$qry = "SELECT transaksi.id_transaksi,transaksi.kode_transaksi,transaksi.tanggal,transaksi.status,barang.nama,barang.stok_barang FROM transaksi INNER JOIN barang ON transaksi.id_barang=barang.id_barang WHERE transaksi.tanggal like '$tanggal' ORDER BY transaksi.id_transaksi ASC";
		}else{
			$qry = "SELECT transaksi.id_transaksi,transaksi.kode_transaksi,transaksi.tanggal,transaksi.status,barang.nama,barang.stok_barang FROM transaksi INNER JOIN barang ON transaksi.id_barang=barang.id_barang ORDER BY transaksi.id_transaksi ASC";
		}
		//return $this->db->get("transaksi")->result_array();
		return $this->db->query($qry)->result_array();
    }
    
	public function getTanggal()
	{
		//return $this->db->get("transaksi")->result_array();
		$qry = "select distinct tanggal from transaksi order by tanggal desc";
		return $this->db->query($qry)->result_array();
    }
    public function edit()
	{
        $this->db->set('status',$this->input->post('status'));
        $this->db->where('id_transaksi',$this->input->post('id'));
        $this->db->update('transaksi');
	}
    
}