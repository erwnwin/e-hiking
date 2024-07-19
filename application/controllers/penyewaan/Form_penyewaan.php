<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Form_penyewaan extends CI_Controller
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
        $data['title'] = "Form Penyewaan : e-Hiking";

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('pelanggan/penyewaan/cart_view', $data);
        $this->load->view('template/admin/footer', $data);
    }


    public function checkout()
    {
    }
}

/* End of file Form_penyewaan.php */
