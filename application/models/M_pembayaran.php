<?php
class M_pembayaran extends CI_Model
{
    public function add_pembayaran($data)
    {
        $this->db->insert('pembayaran', $data);
    }
}
