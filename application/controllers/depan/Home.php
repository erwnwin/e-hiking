<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Home : e-Hiking";

        $this->load->view('template/depan/head', $data);
        $this->load->view('template/depan/header', $data);
        $this->load->view('template/depan/navbar', $data);
        $this->load->view('depan/home', $data);
        $this->load->view('template/depan/footer', $data);
    }
}

/* End of file Home.php */
