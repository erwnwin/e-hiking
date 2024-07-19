<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Forgot_password extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
    }


    public function index()
    {
        $data['title'] = "Lupa Password : e-Hiking";

        $this->load->view('depan/auth/lupa_password', $data);
    }


    public function kirim_email_reset()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            // Form validation passed, continue with sending reset email
            $email = $this->input->post('email');

            // Check if email exists in database
            $user = $this->m_pelanggan->get_email_pelanggan($email);

            if (!$user) {
                // Email not found in database
                echo json_encode(['status' => 'error', 'message' => 'Alamat Email tidak ditemukan']);
            } else {
                // Generate and save token for reset password
                $token = base64_encode(random_bytes(32));
                $this->m_pelanggan->set_reset_token($email, $token);

                // Send email with reset link
                $this->_sendEmailReset($email, $token);

                // Return success message
                echo json_encode(['status' => 'success', 'message' => 'Email dengan instruksi reset password telah dikirim']);
            }
        }
    }

    private function _sendEmailReset($email, $token)
    {
        // Configure email settings
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_crypto' => 'ssl',
            'smtp_user' => 'remindermyfinance@gmail.com', // Update with your Gmail address
            'smtp_pass' => 'wexykdzulissqawy', // Update with your Gmail password
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        // Email content
        $this->email->from('remindermyfinance@gmail.com', 'e-Hiking Notifikasi Reset');
        $this->email->to($email);
        $this->email->subject('Reset Password');
        $this->email->message('
            <p>Klik link berikut untuk mereset password Anda:</p>
            <a href="' . base_url('forgot_password/reset_password?email=' . urlencode($email) . '&token=' . urlencode($token)) . '">Reset Password</a>
            <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
        ');

        // Send email
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function reset_password()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        // Validate email and token
        if (!$email || !$token) {
            // Invalid request
            show_error('Invalid reset link');
        }

        // Load view for reset password form
        $this->load->view('depan/auth/form_reset_password', ['email' => $email, 'token' => $token]);
    }

    public function update_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('token', 'Token', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            // Form validation passed, continue with updating password
            $email = $this->input->post('email');
            $token = $this->input->post('token');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            // Validate token
            $user = $this->m_pelanggan->get_reset_token($email, $token);

            if (!$user) {
                // Invalid token
                echo json_encode(['status' => 'error', 'message' => 'Token reset password tidak valid']);
            } else {
                // Update password
                $this->m_pelanggan->update_password($email, $password);

                // Remove/reset token (optional: for security reasons)
                $this->m_pelanggan->remove_reset_token($email);

                // Return success message
                echo json_encode(['status' => 'success', 'message' => 'Password berhasil direset']);
            }
        }
    }
}

/* End of file Forgot_password.php */
