<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pay_fine extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Pembayaran Denda : e-Hiking";

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/pembayaran/fine_payment', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Pay_fine.php */
