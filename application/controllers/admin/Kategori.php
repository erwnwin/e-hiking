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
        $this->load->model('m_kategori');
    }


    public function index()
    {
        $data['title'] = "Kategori : e-Hiking";
        $data['kategori'] = $this->m_kategori->get_data();

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/barang/kategori_barang', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function store()
    {
        $data = array(
            'kategori' => $this->input->post('kategori')
        );

        $insert_id = $this->m_kategori->insert_data($data);

        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Kategori berhasil disimpan!',
                'insert_id' => $insert_id
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Data gagal disimpan'
            );
        }
        echo json_encode($response);
    }
}

/* End of file Kategori.php */
