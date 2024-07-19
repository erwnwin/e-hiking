<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login" && $this->session->userdata('hak_akses') != '1') {
            redirect(base_url("login"));
        }
    }


    public function index()
    {
        $data['title'] = "Kategori : e-Hiking";

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('admin/barang/kategori_barang', $data);
        $this->load->view('template/admin/footer', $data);
    }

    public function create()
    {
        $data['title'] = "Create Barang : e-Hiking";

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('admin/barang/create_kategori_barang', $data);
        $this->load->view('template/admin/footer', $data);
    }
}

/* End of file Kategori.php */
