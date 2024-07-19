<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Status_pengembalian extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_pemesanan');
    }


    public function index()
    {
        $data['title'] = "Status Pengembalian : e-Hiking";

        $id_pelanggan = $this->session->userdata('id_pelanggan'); // Ambil ID pelanggan dari sesi
        $data['status_pesanan'] = $this->m_pemesanan->get_detail_transaksi($id_pelanggan);

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('pelanggan/pengembalian/status', $data);
        $this->load->view('template/admin/footer', $data);
    }
}

/* End of file Status_pengembalian.php */
