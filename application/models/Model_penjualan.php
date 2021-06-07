<?php
class Model_penjualan extends CI_Model {

	
	public function getData()
	{	
		if($this->input->post()){
			$tanggal = $this->input->post('tanggal');
			$qry = "SELECT barang.nama, barang.id_jenis, barang.id_suplier, barang.modal, barang.harga, user.uname, jenis_barang.jenis_barang, suplier.nama_suplier, transaksi.* FROM transaksi transaksi INNER JOIN jenis_barang jenis_barang ON transaksi.id_jenis = jenis_barang.id_jenis INNER JOIN suplier suplier ON transaksi.id_suplier = suplier.id_suplier INNER JOIN barang barang ON transaksi.id_barang = barang.id_barang INNER JOIN user user ON transaksi.id_user = user.id_user WHERE transaksi.tanggal like '$tanggal' ORDER BY transaksi.id_transaksi ASC";
		}else{
			$qry = "SELECT barang.nama, barang.id_jenis, barang.id_suplier, barang.modal, barang.harga, user.uname, jenis_barang.jenis_barang, suplier.nama_suplier, transaksi.* FROM transaksi transaksi INNER JOIN jenis_barang jenis_barang ON transaksi.id_jenis = jenis_barang.id_jenis INNER JOIN suplier suplier ON transaksi.id_suplier = suplier.id_suplier INNER JOIN barang barang ON transaksi.id_barang = barang.id_barang INNER JOIN user user ON transaksi.id_user = user.id_user ORDER BY transaksi.id_transaksi ASC";
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
	public function tambah_penjualan()
	{
		//TANGGAL
		$tgl = date("d-m-Y");
		//INPUTAN USER
		$nama = $this->input->post('nama');
		$jumlah = $this->input->post('jumlah');
		//AMBIL DATA TABLE DARI PILIHAN USER
		$query = "SELECT nama,id_jenis,id_suplier,modal,harga,stok_barang FROM `barang` WHERE id_barang=$nama";
		$barang = $this->db->query($query)->row_array();
		//$barang = $this->db->get_where('barang',array('id_barang'=>$nama))->row_array();
		//UPDATE STOK BARANG
		$sisa = $barang['stok_barang']-$jumlah;
		$this->db->set('stok_barang',$sisa);
		$this->db->where('id_barang',$nama);
		$this->db->update('barang');

		//PERHITUNGAN TOTAL && LABA
		//$modal=$barang['modal'];
		$laba=$barang['harga']-$barang['modal'];
		$total_laba=$laba*$jumlah;
		$total_harga=$barang['harga']*$jumlah;

		
    	$data = array(
    		'kode_transaksi' => $this->input->post('kode'),
    		'tanggal' => $tgl,
    		'id_barang' => $nama,
    		'id_suplier' => $barang['id_suplier'],
    		'id_jenis' => $barang['id_jenis'],
    		'id_user' => $_SESSION['id_user'],
    		'jumlah' => $jumlah,
    		'total_harga' => $total_harga,
    		'laba' => $total_laba
		);
    	$this->db->insert('transaksi',$data);
	}
	public function selectData($id)
	{
    	$this->db->where('id_transaksi',$id);
    	return $this->db->get('transaksi')->row_array();
	}
	public function edit_penjualan()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$jumlah = $this->input->post('jumlah');
		//TANGGAL
		$tgl = date("d-m-Y");
		//
		$jumlah_penjualan = $this->db->get_where('transaksi',array('id_transaksi'=>$id))->row_array();
		//
		$barang = $this->db->get_where('barang',array('id_barang'=>$nama))->row_array();
		//UPDATE STOK BARANG
		if ($jumlah > $jumlah_penjualan['jumlah']) {

			$hasil = $jumlah_penjualan['jumlah'] - $jumlah;
			$sisa = $barang['stok_barang']+$hasil;
		}else{
			$hasil = $jumlah - $jumlah_penjualan['jumlah'];
			$sisa = $barang['stok_barang']-$hasil;
		}
		$this->db->set('stok_barang',$sisa);
		$this->db->where('id_barang',$nama);
		$this->db->update('barang');
		
		//
		
		//MASIH GAGAL UPDATE JUMLAH BARANG

		// $modal=$barang['modal'];
		// $laba=$harga-$modal;
		// $labaa=$laba*$jumlah;
		// $total_harga=$harga*$jumlah;

		//PERHITUNGAN TOTAL && LABA
		$laba=$barang['harga']-$barang['modal'];
		$total_laba=$laba*$jumlah;
		$total_harga=$barang['harga']*$jumlah;

    	$data = array(
    		'tanggal' => $tgl,
    		'id_barang' => $nama,
    		'id_suplier' => $barang['id_suplier'],
    		'id_jenis' => $barang['id_jenis'],
    		'id_user' => $_SESSION['id_user'],
    		'jumlah' => $jumlah,
    		'total_harga' => $total_harga,
    		'laba' => $total_laba
    	);
    	$this->db->where('id_transaksi',$id);
    	$this->db->update('transaksi',$data);
	}
	public function exportxcl($tanggal)
	{
	    
		if($tanggal == null){
			$qry = "SELECT barang.nama, barang.id_jenis, barang.id_suplier, barang.modal, barang.harga, user.uname, jenis_barang.jenis_barang, suplier.nama_suplier, transaksi.* FROM transaksi transaksi INNER JOIN jenis_barang jenis_barang ON transaksi.id_jenis = jenis_barang.id_jenis INNER JOIN suplier suplier ON transaksi.id_suplier = suplier.id_suplier INNER JOIN barang barang ON transaksi.id_barang = barang.id_barang INNER JOIN user user ON transaksi.id_user = user.id_user ORDER BY transaksi.id_transaksi ASC";
		}else{			
			$qry = "SELECT barang.nama, barang.id_jenis, barang.id_suplier, barang.modal, barang.harga, user.uname, jenis_barang.jenis_barang, suplier.nama_suplier, transaksi.* FROM transaksi transaksi INNER JOIN jenis_barang jenis_barang ON transaksi.id_jenis = jenis_barang.id_jenis INNER JOIN suplier suplier ON transaksi.id_suplier = suplier.id_suplier INNER JOIN barang barang ON transaksi.id_barang = barang.id_barang INNER JOIN user user ON transaksi.id_user = user.id_user WHERE transaksi.tanggal like '$tanggal' ORDER BY transaksi.id_transaksi ASC";
		}
		
		return $this->db->query($qry);
	}

}
