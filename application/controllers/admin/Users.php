<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login" && $this->session->userdata('hak_akses') != '1') {
            redirect(base_url("login"));
        }
    }


    public function index()
    {
        $data['title'] = "Users : e-Hiking";

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('admin/users/users', $data);
        $this->load->view('template/admin/footer', $data);
    }

    public function create()
    {
        $data['title'] = "Create Users : e-Hiking";

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('admin/users/create_users', $data);
        $this->load->view('template/admin/footer', $data);
    }
}

/* End of file Users.php */
