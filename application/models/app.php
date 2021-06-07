<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class App extends CI_Model {
 
    function __construct()
    {
        parent::__construct();
    }
 
    function getAll()
    {
        $this->db->from('jenis_barang'); //nama tabel harap disesuaikan dengan nama tabel milik sobat
 
        return $this->db->get();
    }
}