<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_penyewaan extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Laporan Penyewaan : e-Hiking";

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/laporan/penyewaan', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Laporan_penyewaan.php */
