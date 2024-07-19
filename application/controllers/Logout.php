<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

    public function index()
    {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    // public function logout()
    // {
    // }
}

/* End of file Logout.php */
