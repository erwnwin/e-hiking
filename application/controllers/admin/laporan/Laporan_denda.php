<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_denda extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Laporan Denda : e-Hiking";

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/laporan/denda', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Laporan_denda.php */
