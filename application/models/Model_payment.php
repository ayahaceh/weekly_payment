<?php
class Model_payment extends CI_Model
{

    public function mingguan($id_project, $minggu)
    {
        $this->db->select_sum('t1.vol', 'volnow', false);
        $this->db->select_sum('t2.nama', 'vollast', false);
        $this->db->select('t1.id, t1.id_project, t1.id_barang, t1.potongan, t1.minggu,
        t2.nama, t2.satuan, t2.harga', false)
            ->from('pemakaian as t1')
            ->where('t1.id_project', $id_project)
            ->where('t1.minggu', $minggu)
            ->join('barang as t2', 't2.id_barang = t1.id_barang', 'INNER');
        $item_a = $this->db->group_by('t2.id_barang')->get_compiled_select();
        $this->db->select_sum('t2.nama', 'volnow', false);
        $this->db->select_sum('t1.vol', 'vollast', false);
        $this->db->select('t1.id, t1.id_project, t1.id_barang, t1.potongan, t1.minggu,
            t2.nama, t2.satuan, t2.harga', false)
            ->from('pemakaian as t1')
            ->where('t1.id_project', $id_project)
            ->where('t1.minggu <', $minggu)
            ->join('barang as t2', 't2.id_barang = t1.id_barang', 'INNER');
        $item_b = $this->db->group_by('t2.id_barang')->get_compiled_select();
        $item = $this->db->query($item_a . " UNION " . $item_b)->result_array();

        return $item;
    }





    //-----
}
