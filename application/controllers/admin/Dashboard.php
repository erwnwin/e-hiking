<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->library('encryption');
    }


    public function index()
    {

        if ($this->session->userdata('hak_akses') == "1" || $this->session->userdata('hak_akses') == "2" || $this->session->userdata('hak_akses') == "3") {

            

            $data['title'] = "Dashboard : e-Hiking";
            
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/navbar', $data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('template/admin/footer', $data);
        }

        if ($this->session->userdata('hak_akses') == "4") {

            date_default_timezone_set('Asia/Makassar'); // Set timezone sesuai lokasi Anda
            $hour = date('H');

            if ($hour < 12) {
                $greeting = "Good Morning";
            } elseif ($hour < 18) {
                $greeting = "Good Afternoon";
            } else {
                $greeting = "Good Evening";
            }

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

            $data['greeting'] = $greeting;
            $data['foto'] = $foto;
            $data['inisial'] = $inisial;
            $data['title'] = "Dashboard : e-Hiking";

            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/navbar', $data);
            $this->load->view('pelanggan/dashboard', $data);
            $this->load->view('template/admin/footer', $data);
        }
    }
}

/* End of file Dashboard.php */
