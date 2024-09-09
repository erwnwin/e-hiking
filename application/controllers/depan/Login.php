<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_user');
    }


    public function index()
    {
        $data['title'] = "Login : e-Hiking";

        $this->load->view('depan/auth/login_page', $data);
    }

    public function authenticate()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            // Form validation passed, continue with authentication
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Check if user exists in pelanggan table
            $user = $this->m_pelanggan->get_email_pelanggan($email);

            if (!$user) {
                // If user not found in pelanggan, check in user (admin, petugas, owner) table
                $user = $this->m_user->get_email($email);
                $user_type = 'user'; // Generalize as 'user' for various roles in the user table
            } else {
                $user_type = 'pelanggan';
            }

            if (!$user || !password_verify($password, $user['password'])) {
                // Invalid credentials
                echo json_encode(['status' => 'error', 'message' => 'Email atau password salah']);
            } else {
                // Check if email is activated
                $status_key = ($user_type == 'pelanggan') ? 'status_pelanggan' : 'status_user';
                if ($user[$status_key] != 'Active') {
                    // Email not activated
                    echo json_encode(['status' => 'error', 'message' => 'Alamat Email belum diaktivasi']);
                } else {
                    // Login successful, set session variables
                    if ($user_type == 'pelanggan') {
                        $this->session->set_userdata([
                            'id_pelanggan' => $user['id_pelanggan'],
                            'email' => $user['email'],
                            'nama' => $user['nama_pelanggan'],
                            'no_hp_wa' => $user['no_hp_wa'],
                            'hak_akses' => '4',
                            'status' => "login",
                            // Add other user details as needed
                        ]);
                    } else {
                        // Handle user roles (admin, petugas, owner)
                        $role = $user['role'];
                        $access_level = 0; // Default access level

                        switch ($role) {
                            case 'admin':
                                $access_level = 1;
                                break;
                            case 'owner':
                                $access_level = 2;
                                break;
                            case 'petugas':
                                $access_level = 3;
                                break;
                            default:
                                $access_level = 0; // No specific role assigned
                        }

                        $this->session->set_userdata([
                            'id_user' => $user['id_user'],
                            'email' => $user['email'],
                            'nama' => $user['nama_lengkap'],
                            'no_hp_wa' => $user['no_hp_wa'],
                            'foto' => $user['foto'],
                            'hak_akses' => $access_level,
                            'status' => "login",
                            'role' => $role,
                            // Add other user details as needed
                        ]);
                    }

                    // Return success message
                    echo json_encode(['status' => 'success', 'message' => 'Login successful']);
                }
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('home'));
    }
}

/* End of file Login.php */
