<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Info_app extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Info App : e-Hiking";

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/info/info_apps', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Info_app.php */
