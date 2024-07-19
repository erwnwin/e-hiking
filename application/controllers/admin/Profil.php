<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->library('encryption');
        $this->encryption->initialize(array('driver' => 'openssl'));
    }


    public function index()
    {

        $data['title'] = "Profil : e-Hiking";

        $nama = $this->session->userdata('nama'); // Gantilah dengan nama yang sesuai dengan session Anda
        $foto = $this->session->userdata('foto'); // Asumsikan 'foto' menyimpan URL foto pengguna

        // Mendapatkan inisial dari nama
        $nama_parts = explode(' ', $nama);

        if (count($nama_parts) > 1) {
            // Jika nama terdiri dari lebih dari satu kata, ambil huruf pertama dari setiap kata
            $inisial = strtoupper(substr($nama_parts[0], 0, 1) . substr($nama_parts[1], 0, 1));
        } else {
            // Jika nama hanya satu kata, ambil dua huruf pertama dari kata tersebut
            $inisial = strtoupper(substr($nama_parts[0], 0, 2));
        }

        // $data['greeting'] = $greeting;
        $data['foto'] = $foto;
        $data['inisial'] = $inisial;

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('admin/profil', $data);
        $this->load->view('template/admin/footer', $data);
    }
}

/* End of file Profil.php */
