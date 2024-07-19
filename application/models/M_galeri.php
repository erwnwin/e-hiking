<?php
class M_galeri extends CI_Model
{

    public function insert($data)
    {
        $this->db->insert('galeri', $data);
    }
}
