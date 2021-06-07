<?php
class Model_user extends CI_Model {

	
	public function getData()
	{
		$this->db->order_by("id_barang", "desc");
    	return $this->db->get("barang")->result_array();
    }
    public function beli_barang()
	{
		//TANGGAL
		$tgl = date("d-m-Y");
		//INPUTAN USER
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
        $jumlah = $this->input->post('jumlah');
        
		//AMBIL DATA TABLE DARI PILIHAN USER
		$query = "SELECT nama,id_jenis,id_suplier,modal,harga,stok_barang FROM `barang` WHERE id_barang=$id";
		$barang = $this->db->query($query)->row_array();
		//$barang = $this->db->get_where('barang',array('id_barang'=>$nama))->row_array();
		//UPDATE STOK BARANG
		$sisa = $barang['stok_barang']-$jumlah;
		$this->db->set('stok_barang',$sisa);
		$this->db->where('id_barang',$id);
		$this->db->update('barang');

		//PERHITUNGAN TOTAL && LABA
		//$modal=$barang['modal'];
		$laba=$barang['harga']-$barang['modal'];
		$total_laba=$laba*$jumlah;
		$total_harga=$barang['harga']*$jumlah;

		
    	$data = array(
    		'kode_transaksi' => $this->input->post('kode'),
    		'tanggal' => $tgl,
    		'id_barang' => $id,
    		'id_suplier' => $barang['id_suplier'],
    		'id_jenis' => $barang['id_jenis'],
    		'id_user' => $_SESSION['id_user'],
    		'jumlah' => $jumlah,
    		'total_harga' => $total_harga,
    		'laba' => $total_laba
		);
    	$this->db->insert('transaksi',$data);
    }
    public function detail($id)
	{
        return $this->db->get_where("transaksi",array('id_user'=>$id))->num_rows();
        
		//$qry = "SELECT barang.nama, barang.id_jenis, barang.id_suplier, barang.modal, barang.harga, user.uname, jenis_barang.jenis_barang, suplier.nama_suplier, transaksi.* FROM transaksi transaksi INNER JOIN jenis_barang jenis_barang ON transaksi.id_jenis = jenis_barang.id_jenis INNER JOIN suplier suplier ON transaksi.id_suplier = suplier.id_suplier INNER JOIN barang barang ON transaksi.id_barang = barang.id_barang INNER JOIN user user ON transaksi.id_user = user.id_user WHERE transaksi.id_user='$id'";
		//return $this->db->query($qry);
    }
    public function jenis()
	{
        return $this->db->get("jenis_barang")->result_array();
    }
    public function isicart($id)
	{
		$qry = "SELECT barang.nama, barang.id_jenis, barang.id_suplier, barang.modal, barang.harga, user.uname, jenis_barang.jenis_barang, suplier.nama_suplier, transaksi.* FROM transaksi transaksi INNER JOIN jenis_barang jenis_barang ON transaksi.id_jenis = jenis_barang.id_jenis INNER JOIN suplier suplier ON transaksi.id_suplier = suplier.id_suplier INNER JOIN barang barang ON transaksi.id_barang = barang.id_barang INNER JOIN user user ON transaksi.id_user = user.id_user WHERE transaksi.id_user='$id'";
        return $this->db->query($qry)->result_array();
	}

}