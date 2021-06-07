<?php
class Model_project extends CI_Model
{


    public function getData()
    {
        $project = $this->db->select('t1.id, t1.foto, t1.nama_project, t1.id_costumer, t1.harga, 
            t2.nama_costumer')
            ->from('project as t1')
            ->join('costumer as t2', 't1.id_costumer = t2.id_costumer', 'LEFT')
            ->order_by("id", "DESC")
            ->get()
            ->result_array();

        return $project;

        // $this->db->order_by("id", "desc");
        // return $this->db->get("project")->result_array();
    }

    public function selectData($id)
    {
        $project = $this->db->select('t1.id, t1.nama_project, t1.id_costumer, t1.harga, t1.lunas, 
            t2.nama_costumer')
            ->from('project as t1')
            ->where('t1.id', $id)
            ->join('costumer as t2', 't1.id_costumer = t2.id_costumer', 'INNER')
            ->order_by("id", "DESC")
            ->get()
            ->row_array();

        return $project;
    }

    public function tambah_project()
    {
        $data['title'] = $this->input->post('title');
        $data['content'] = $this->input->post('content');
        $data['url'] = $this->input->post('url');
        //konfigurasi upload
        $config['upload_path']         = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 10000;
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
            'nama_project' => $this->input->post('nama_project'),
            'id_costumer' => $this->input->post('id_costumer'),
            'harga' => $this->input->post('harga'),
            'lunas' => 0,
        );
        $this->db->insert('project', $data);
    }

    public function edit_project()
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
            $foto = $this->db->get_where('project', array('id' => $id))->row_array();

            $data = array(
                'foto' => $data['cover'],
                'nama_project'  => $this->input->post('nama_project'),
                'id_costumer'   => $this->input->post('id_costumer'),
            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('project', $data);
        } else {
            $data['cover'] = $this->upload->data('file_name');

            $data = array(
                'foto' => $data['cover'],
                'nama_project' => $this->input->post('nama_project'),
                'id_costumer' => $this->input->post('id_costumer'),
                'harga' => $this->input->post('harga'),
            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('project', $data);
        }
    }
}
