<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    public function get_email_pelanggan($email)
    {
        $query = $this->db->get_where('pelanggan', ['email' => $email]);
        return $query->row_array();
    }


    public function set_reset_token($email, $token)
    {
        // Save reset token to database
        $this->db->where('email', $email);
        $this->db->update('pelanggan', ['reset_token' => $token]);
    }

    public function get_reset_token($email, $token)
    {
        // Query to check if reset token is valid
        $query = $this->db->get_where('pelanggan', ['email' => $email, 'reset_token' => $token]);
        return $query->row_array(); // Return user data as an array
    }

    public function update_password($email, $password)
    {
        // Update user password in database
        $this->db->where('email', $email);
        $this->db->update('pelanggan', ['password' => $password]);
    }

    public function remove_reset_token($email)
    {
        // Remove/reset reset token from database
        $this->db->where('email', $email);
        $this->db->update('pelanggan', ['reset_token' => null]);
    }
}

/* End of file M_pelanggan.php */
