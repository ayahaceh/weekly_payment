<?php
class Model_costumer extends CI_Model {

	
	public function getData()
	{
    	return $this->db->get("user")->result_array();
    }
    public function detailcostumer($id)
	{
		//return $this->db->get("transaksi")->result_array();
		$qry = "SELECT barang.nama, barang.id_jenis, barang.id_suplier, barang.modal, barang.harga, user.uname, jenis_barang.jenis_barang, suplier.nama_suplier, transaksi.* FROM transaksi transaksi INNER JOIN jenis_barang jenis_barang ON transaksi.id_jenis = jenis_barang.id_jenis INNER JOIN suplier suplier ON transaksi.id_suplier = suplier.id_suplier INNER JOIN barang barang ON transaksi.id_barang = barang.id_barang INNER JOIN user user ON transaksi.id_user = user.id_user WHERE transaksi.id_user='$id'";
		return $this->db->query($qry)->result_array();
	}
	public function tambah_costumer()
	{
        $data['title']=$this->input->post('title');
        $data['content']=$this->input->post('content');
        $data['url']=$this->input->post('url');
        //konfigurasi upload
        $config['upload_path']         = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 2000;
        $config['max_height']           = 1600;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('cover'))
        {
           echo "foto tidak boleh kosong";
        }
        else
        {
            $data['cover'] = $this->upload->data('file_name');

        }
    	$data = array(
            'foto' => $data['cover'],
    		'uname' => $this->input->post('nama'),
    		'pass' => $this->input->post('pass'),
    		'status' => $this->input->post('status')
    	);
    	$this->db->insert('user',$data);
	}
	public function selectData($id)
	{
		$this->db->where('id_user',$id);
    	return $this->db->get('user')->row_array();
	}
	public function edit_costumer()
	{  
        $data['title']=$this->input->post('title');
        $data['content']=$this->input->post('content');
        $data['url']=$this->input->post('url');
        //konfigurasi upload
        $config['upload_path']         = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 2000;
        $config['max_height']           = 1600;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('cover'))
        {
               
            $id = $this->input->post('id');
            $foto = $this->db->get_where('user',array('id_user'=>$id))->row_array();

            $data = array(
                'foto' => $foto['foto'],
        		'uname' => $this->input->post('nama'),
        		'pass' => $this->input->post('pass'),
    	    	'status' => $this->input->post('status')
            );
            $this->db->where('id_user',$this->input->post('id'));
            $this->db->update('user',$data);
        }
        else
        {
            $data['cover'] = $this->upload->data('file_name');

            $data = array(
                'foto' => $data['cover'],
        		'uname' => $this->input->post('nama'),
        		'pass' => $this->input->post('pass'),
    	    	'status' => $this->input->post('status')
            );
            $this->db->where('id_user',$this->input->post('id'));
            $this->db->update('user',$data);
        }

	}

}
