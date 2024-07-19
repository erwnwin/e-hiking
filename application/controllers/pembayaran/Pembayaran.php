<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
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
        $data['title'] = 'Pembayaran : e-Hiking';

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('pelanggan/denda/pembayaran', $data);
        $this->load->view('template/admin/footer', $data);
    }
}

/* End of file Pembayaran.php */
