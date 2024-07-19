<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function get_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}

/* End of file M_user.php */
