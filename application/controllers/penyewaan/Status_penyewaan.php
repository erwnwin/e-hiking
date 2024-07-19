<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Status_penyewaan extends CI_Controller
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
        $data['title'] = "Status Penyewaan : e-Hiking";

        $id_pelanggan = $this->session->userdata('id_pelanggan'); // Ambil ID pelanggan dari sesi
        $data['status_pesanan'] = $this->m_pemesanan->get_status($id_pelanggan);

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('pelanggan/penyewaan/status', $data);
        $this->load->view('template/admin/footer', $data);
    }
}

/* End of file Status_penyewaan.php */
