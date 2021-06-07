<?php
class Model_pembelian extends CI_Model
{
    public function exportxcl()
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('suplier', 'suplier.id_supplier = pembelian.id_supplier');
        return $this->db->get();
        // return $this->db->query("SELECT br.*,jb.jenis_barang,su.nama_suplier FROM barang AS br,jenis_barang AS jb,suplier AS su WHERE jb.id_jenis=br.id_jenis AND su.id_suplier=br.id_suplier");
    }

    public function getData()
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('suplier', 'suplier.id_supplier = pembelian.id_supplier');
        return $this->db->get()->result_array();
    }

    public function tambah_pembelian()
    {
        $data = array(
            'id_supplier'       => $this->input->post('id_supplier'),
            'tgl_pembelian'     => $this->input->post('tgl_pembelian'),
            'kode_faktur'       => $this->input->post('kode_faktur'),
            'tgl_pengiriman'    => $this->input->post('tgl_pengiriman'),
            'alamat_pengiriman' => $this->input->post('alamat_pengiriman'),
        );
        $this->db->insert('pembelian', $data);
        // ambil id pembelian
        return $this->db->select('id')->limit(1)->order_by('id', "DESC")->get('pembelian')->row();
    }

    public function tambah_detail()
    {
        $id = $this->uri->segment(3);
        $data = array(
            'id_pembelian'  => $id,
            'id_barang'     => $this->input->post('id_barang'),
            'unit_barang'   => $this->input->post('unit_barang'),
            'harga_satuan'  => $this->input->post('harga_satuan'),
        );
        $this->db->insert('pembelian_detail', $data);
        // Ambil id pembelian 
        return $id;
    }

    public function selectDataPembelian($id)
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->where('pembelian.id', $id);
        $this->db->join('suplier', 'suplier.id_supplier = pembelian.id_supplier');
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }

    public function selectDataPembelianDetail($id)
    {
        $project = $this->db->select('t1.id, t1.id_pembelian, t1.id_barang, t1.unit_barang, t1.harga_satuan, 
        t2.id_barang, t2.kode_barang, t2.nama, t2.satuan')
            ->from('pembelian_detail as t1')
            ->join('barang as t2', 't1.id_barang = t2.id_barang', 'LEFT')
            ->where('t1.id_pembelian = ' . $id)
            ->order_by("id", "DESC")
            ->get()
            ->result_array();
        return $project;

        // $this->db->select('*');
        // $this->db->from('pembelian_detail');
        // $this->db->where('pembelian_detail.id_pembelian', $id);
        // $this->db->join('barang', 'barang.id_barang = pembelian_detail.id_barang');
        // return $this->db->get()->result_array();
    }









    // ----
    public function tambah_barang____()
    {

        //konfigurasi upload
        $config['upload_path']         = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 2000;
        $config['max_height']           = 1600;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('cover')) {
            echo "foto tidak boleh kosong";
        } else {
            $data['cover'] = $this->upload->data('file_name');
        }

        $data = array(
            'foto' => $data['cover'],
            'nama' => $this->input->post('nama'),
            'satuan' => $this->input->post('satuan'),
            'id_jenis' => $this->input->post('jenis'),
            'id_suplier' => $this->input->post('suplier'),
            'stok_barang' => $this->input->post('stok'),
            'modal' => $this->input->post('modal'),
            'harga' => $this->input->post('jual'),
        );
        $this->db->insert('barang', $data);
    }
    public function selectData($id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->get('barang')->row_array();

        //return $this->db->query("SELECT br.*,jb.jenis_barang,su.nama_suplier FROM barang AS br,jenis_barang AS jb,suplier AS su WHERE br.id_barang='$id' AND jb.id_jenis=br.id_jenis AND su.id_suplier=br.id_suplier")->row_array();
    }
    public function detaildata($id)
    {
        //$this->db->where('id_barang',$id);
        //return $this->db->get('barang')->row_array();

        return $this->db->query("SELECT br.*,jb.jenis_barang,su.nama_suplier FROM barang AS br,jenis_barang AS jb,suplier AS su WHERE br.id_barang='$id' AND jb.id_jenis=br.id_jenis AND su.id_suplier=br.id_suplier")->row_array();
    }

    public function edit_barang()
    {

        $data['title'] = $this->input->post('title');
        $data['content'] = $this->input->post('content');
        $data['url'] = $this->input->post('url');
        //konfigurasi upload
        $config['upload_path']         = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 2000;
        $config['max_height']           = 1600;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('cover')) {

            $id = $this->input->post('id');
            $foto = $this->db->get_where('barang', array('id_barang' => $id))->row_array();

            $data = array(
                'foto' => $foto['foto'],
                'nama' => $this->input->post('nama'),
                'satuan' => $this->input->post('satuan'),
                'id_jenis' => $this->input->post('jenis'),
                'id_suplier' => $this->input->post('suplier'),
                'stok_barang' => $this->input->post('stok'),
                'modal' => $this->input->post('modal'),
                'harga' => $this->input->post('jual'),
            );
            $this->db->where('id_barang', $this->input->post('id'));
            $this->db->update('barang', $data);
        } else {
            $data['cover'] = $this->upload->data('file_name');

            $data = array(
                'foto' => $data['cover'],
                'nama' => $this->input->post('nama'),
                'satuan' => $this->input->post('satuan'),
                'id_jenis' => $this->input->post('jenis'),
                'id_suplier' => $this->input->post('suplier'),
                'stok_barang' => $this->input->post('stok'),
                'modal' => $this->input->post('modal'),
                'harga' => $this->input->post('jual'),
            );
            $this->db->where('id_barang', $this->input->post('id'));
            $this->db->update('barang', $data);
        }
    }
}
