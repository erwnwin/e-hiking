<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penyewaan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pemesanan');
        $this->load->model('transaction_model');

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }


    public function index()
    {
        $data['title'] = "Penyewaan : e-Hiking";
        $data['status_pesanan'] = $this->m_pemesanan->get_all();

        foreach ($data['status_pesanan'] as &$pesanan) {
            $pesanan['hash_id'] = md5($pesanan['id']);
        }

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/penyewaan/penyewaan', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function detail($hash_id)
    {
        // Load model
        $data['title'] = "Detail Penyewaan : e-Hiking";

        // Ambil data pesanan berdasarkan hash_id
        $data['pesanan'] = $this->m_pemesanan->get_pesanan_by_hash($hash_id);

        // Initialize total price
        $total_price = 0;

        // Calculate total price
        foreach ($data['pesanan'] as $item) {
            $total_price += $item['price'] * $item['quantity'];
        }

        // Calculate remaining payment
        $data['total_price'] = $total_price;
        $data['sisa_pembayaran'] = $total_price - $data['pesanan'][0]['initial_payment'];


        if ($data['pesanan']) {
            // Load view dengan data pesanan
            $this->load->view('layouts/head', $data);
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('admin/penyewaan/detail_penyewaan', $data);
            $this->load->view('layouts/footer', $data);
        } else {
            show_404();
        }
    }

    public function update_status()
    {
        $transaction_id = $this->input->post('transaction_id');
        $status = $this->input->post('status');

        // Update status di database
        $result = $this->transaction_model->update_status($transaction_id, $status);

        // Mengembalikan hasil sebagai JSON
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
}

/* End of file Penyewaan.php */
