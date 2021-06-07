<?php
class Model_pemakaian extends CI_Model
{


    // public function getData()
    // {
    //     $data = $this->db->select('t1.id, t1.foto, t1.nama_project, t1.id_costumer, t1.harga, 
    //         t2.nama_costumer')
    //         ->from('project as t1')
    //         ->join('costumer as t2', 't1.id_costumer = t2.id_costumer', 'LEFT')
    //         ->order_by("id", "DESC")
    //         ->get()
    //         ->result_array();

    //     return $data;

    // }

    public function selectData($id)
    {
        $data = $this->db->select('t1.id, t1.tgl, t1.vol, t1.potongan, 
            t2.id_barang, t2.nama, t2.harga, t2.stok_barang, t2.foto, t2.satuan')
            // ,
            // t3.nama_Satuan')

            ->from('pemakaian as t1')
            ->join('barang as t2', 't1.id_barang = t2.id_barang', 'INNER')
            ->where('t1.id_project', $id)
            ->order_by("t1.id", "DESC")
            ->get()
            ->result_array();


        return $data;
    }

    public function selectBarang($id)
    {
        $data = $this->db->select('t1.id, t1.tgl, t1.vol, t1.potongan, 
            t2.id_barang, t2.nama, t2.harga, t2.stok_barang, t2.foto, t2.satuan')

            ->from('pemakaian as t1')
            ->join('barang as t2', 't1.id_barang = t2.id_barang', 'INNER')
            ->where('t1.id_project', $id)
            ->order_by("t1.id", "DESC")
            ->get()
            ->result_array();

        return $data;
    }

    public function tambah_pemakaian()
    {
        $data['title']      = $this->input->post('title');
        $data['content']    = $this->input->post('content');
        $data['url']        = $this->input->post('url');
        $id_project         = $this->input->post('id_project');
        $tgl = $this->input->post('tgl');
        // date('d-M-Y H:i:s', strtotime($result['date_added'])),
        $tgl = date("Y-m-d", strtotime($tgl));
        $data = array(
            'id_project'    => $id_project,
            'id_barang'     => $this->input->post('id_barang'),
            'tgl'           => $tgl,
            'vol'           => $this->input->post('vol'),
            'potongan'      => $this->input->post('potongan'),
            'minggu'        => $this->input->post('minggu'),
        );
        $this->db->insert('pemakaian', $data);
        return $id_project;
    }




    //---
}
