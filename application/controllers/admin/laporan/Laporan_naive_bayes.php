<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_naive_bayes extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Penyewaan : e-Hiking";

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/laporan/naive_bayes', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Laporan_naive_bayes.php */
