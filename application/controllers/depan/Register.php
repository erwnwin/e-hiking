<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Registrasi : e-Hiking";

        $this->load->view('depan/auth/register_page', $data);
    }


    public function act()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|exact_length[16]|numeric');
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|valid_email|is_unique[pelanggan.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan/Profesi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp_wa', 'No HP/WA', 'required|exact_length[12]|numeric');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['status' => 'error', 'message' => $errors]);
        } else {
            // Data dari form
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'nik' => $this->input->post('nik'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Hash password
                'pekerjaan' => $this->input->post('pekerjaan'),
                'alamat' => $this->input->post('alamat'),
                'no_hp_wa' => $this->input->post('no_hp_wa'),
                'created_at' => date('Y-m-d H:i:s'),
                'status_pelanggan' => 'Non Active' // Status belum aktif
            );

            $email = $this->input->post('email');
            $sql = $this->db->query("SELECT email FROM pelanggan where email='$email' ");
            $cek = $sql->num_rows();
            if ($cek > 0) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Alamat email sudah terdaftar!'
                ]);
            } else {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('pelanggan', $data);
                $this->db->insert('pelanggan_token', $user_token);

                // Panggil method untuk mengirim email aktivasi
                $this->_sendEmailDaftar($token, 'verify');

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Registrasi berhasil. Silakan cek email untuk aktivasi.',
                    'redirect' => base_url('login') // URL untuk redirect setelah registrasi berhasil
                ]);
            }
        }
    }

    private function _sendEmailDaftar($token, $type)
    {
        // $config =
        //     [
        //         'protocol' => 'smtp',
        //         'smtp_host' => 'ssl://smtp.googlemail.com',
        //         'smtp_user' => 'remindermyfinance@gmail.com',
        //         'smtp_pass' => 'wexykdzulissqawy',
        //         // 'smtp_port' => 587,
        //         'smtp_port' => 465,
        //         'mailtype' => 'html',
        //         'charset' => 'utf-8',
        //         'newline' => "\r\n"

        //     ];

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
        // end config
        // 6L1LyRfK64a6W8J)IhNx
        // dQ8=XC>z*G{Q\!K>

        $this->email->from('remindermyfinance@gmail.com', 'e-Hiking Notifikasi');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {

            $headerImage = base_url('assets/img/header_image.png');
            $footerImage = base_url('assets/img/footer_image.png');

            $this->email->subject('Aktivasi Akun | e-Hiking');
            $this->email->message('
            <p class="text-uppercase"> Hai ' . $this->input->post('nama_pelanggan') . ',</p>
            <p style="text-align: justify; margin-bottom: 20px;""> Terima kasih atas pendaftaran Anda pada e-Hiking. Silahkan klik pada tombol <b>Aktivasi Akun</b> berikut untuk mengaktifkan status akun Anda secara otomatis.</p>
            </br>
            <center>
            <a href="' . base_url() . 'register/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" style=" padding: 0.6em 2em; color: #fff; background-color: #1976d2;font-size: 1.1em;border: 0;cursor: pointer; margin: 1em;"> Aktivasi Akun</a>
            </center>
            <br>
            <p style="text-align: justify; margin-top: 8px;">Jika ketika mengklik <b>Aktivasi Akun</b> tidak berhasil atau muncul tulisan/error. Maka lakukan sekali lagi. Terima Kasih</p>
            <br>
            <p style="margin-top: 8px;">Pesan ini dikirim otomatis oleh sistem</p>
            <p >&copy; Copyright Titik Balik Teknologi</p>
            ');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        // Ambil email dan token dari query string
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        // Cari user berdasarkan email
        $user = $this->db->get_where('pelanggan', ['email' => $email])->row_array();

        if ($user) {
            // Cari user_token berdasarkan token
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                // Periksa apakah token masih berlaku (kurang dari 24 jam)
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    // Update status_pelanggan menjadi 'Active'
                    $this->db->set('status_pelanggan', 'Active');
                    $this->db->where('email', $email);
                    $this->db->update('pelanggan');

                    // Hapus token yang telah digunakan
                    $this->db->delete('user_token', ['email' => $email]);

                    // Kirim email verifikasi berhasil
                    $this->_sendEmailVerif($email);

                    // Set session flashdata untuk sukses verifikasi
                    $this->session->set_flashdata('success', 'Akun Anda telah terverifikasi. Silakan login untuk memulai transaksi Anda.');

                    // Kirim respons JSON sukses
                    echo json_encode(['status' => 'success', 'message' => 'Akun Anda telah terverifikasi. Silakan login untuk memulai transaksi Anda.']);
                } else {
                    // Token kedaluwarsa, hapus data akun dan token
                    $this->db->delete('pelanggan', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    // Set session flashdata untuk token kedaluwarsa
                    $this->session->set_flashdata('error', 'Verifikasi telah berakhir. Silakan registrasi ulang akun Anda.');

                    // Kirim respons JSON token kedaluwarsa
                    echo json_encode(['status' => 'error', 'message' => 'Verifikasi telah berakhir. Silakan registrasi ulang akun Anda.']);
                }
            } else {
                // Token tidak ditemukan, arahkan ke halaman registrasi
                $this->session->set_flashdata('error', 'Token verifikasi tidak valid. Silakan periksa email Anda.');

                // Kirim respons JSON token tidak valid
                echo json_encode(['status' => 'error', 'message' => 'Token verifikasi tidak valid. Silakan periksa email Anda.']);
            }
        } else {
            // Email tidak ditemukan, arahkan ke halaman registrasi
            $this->session->set_flashdata('error', 'Email tidak terdaftar.');

            // Kirim respons JSON email tidak terdaftar
            echo json_encode(['status' => 'error', 'message' => 'Email tidak terdaftar.']);
        }
    }

    private function _sendEmailVerif($email)
    {
        // Konfigurasi email
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

        $this->email->initialize($config);

        $this->email->from('remindermyfinance@gmail.com', 'e-Hiking Notifikasi');
        $this->email->to($email);
        $this->email->subject('Verifikasi Akun');
        $this->email->message('Akun Anda telah berhasil diverifikasi.');

        // Kirim email
        $this->email->send();
    }
}

/* End of file Register.php */
