<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pay_done extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Pembayaran Selesai : e-Hiking";

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/pembayaran/done_payment', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Pay_done.php */
