<?php
class Model_data_barang extends CI_Model
{


    public function getData()
    {
        $this->db->order_by("id_barang", "desc");
        return $this->db->get("barang")->result_array();
    }
    public function tambah_barang()
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
    public function exportxcl()
    {
        return $this->db->query("SELECT br.*,jb.jenis_barang,su.nama_suplier FROM barang AS br,jenis_barang AS jb,suplier AS su WHERE jb.id_jenis=br.id_jenis AND su.id_suplier=br.id_suplier");
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
