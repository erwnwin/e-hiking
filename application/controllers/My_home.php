<?php

defined('BASEPATH') or exit('No direct script access allowed');

class My_home extends CI_Controller
{

    public function index()
    {
        redirect(base_url('home'));
    }
}

/* End of file Home.php */
