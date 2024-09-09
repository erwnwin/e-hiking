<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Denda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }


    public function index()
    {
        $data['title'] = 'Denda : e-Hiking';

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('pelanggan/denda/dendaku', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Denda.php */
