<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_galeri');
        $this->load->model('m_barang');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        // $this->load->model('m_barang');
    }


    public function index()
    {
        $data['title'] = "Barang : e-Hiking";
        $data['produk'] = $this->m_barang->get_all_products();

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


        if (
            $this->session->userdata('hak_akses') == '1' || $this->session->userdata('hak_akses') == '2'
        ) {
            $this->load->view('admin/barang/barang', $data);
        }

        if (
            $this->session->userdata('hak_akses') == '4'
        ) {
            // $cart_items = $this->Cart_model->get_cart_items();

            // $this->load->view('template/admin/head', $data);
            // $this->load->view('template/admin/navbar', $data);
            // $this->load->view('cart_items', ['cart_items' => $cart_items]);
            $this->load->view('pelanggan/penyewaan/cart_view_new', $data);
            // $this->load->view('pelanggan/barang/list_barang', $data);
        }

        $this->load->view('template/admin/footer', $data);
    }



    // function view create
    public function create()
    {
        $data['title'] = "Create Barang : e-Hiking";

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('admin/barang/create_new_barang', $data);
        $this->load->view('template/admin/footer', $data);
    }

    public function save()
    {
        $response = array('status' => 'error', 'message' => 'Gagal menyimpan data.');

        // Validasi input
        $this->form_validation->set_rules('judul_produk', 'Judul Produk', 'required');
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required');
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required|numeric');
        $this->form_validation->set_rules('kategori_produk', 'Kategori Produk', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response['message'] = validation_errors();
            echo json_encode($response);
            return;
        }

        $judul_produk = $this->input->post('judul_produk');
        $deskripsi_produk = $this->input->post('deskripsi_produk');
        $harga_produk = $this->input->post('harga_produk');
        $kategori_produk = $this->input->post('kategori_produk');

        // Proses upload gambar utama
        if (!empty($_FILES['main_image']['name'])) {
            $config['upload_path'] = './uploads/image/main_image/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2 MB
            $config['encrypt_name'] = TRUE;
            $config['file_name'] = 'img_' . time() . '_' . $_FILES['main_image']['name'];
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('main_image')) {
                $main_image_data = $this->upload->data();
                $main_image_path = $main_image_data['file_name'];
            } else {
                $response['message'] = $this->upload->display_errors();
                echo json_encode($response);
                return;
            }
        } else {
            $response['message'] = 'Gambar utama tidak ada.';
            echo json_encode($response);
            return;
        }

        // Simpan data produk
        $product_id = $this->m_barang->insert_product($judul_produk, $deskripsi_produk, $harga_produk, $kategori_produk, $main_image_path);

        if ($product_id) {
            // Proses upload gambar galeri
            $gallery_images = $_FILES['gallery_images'];
            $count = count($gallery_images['name']);

            for ($i = 0; $i < $count; $i++) {
                if ($gallery_images['name'][$i]) {
                    $_FILES['file']['name'] = $gallery_images['name'][$i];
                    $_FILES['file']['type'] = $gallery_images['type'][$i];
                    $_FILES['file']['tmp_name'] = $gallery_images['tmp_name'][$i];
                    $_FILES['file']['error'] = $gallery_images['error'][$i];
                    $_FILES['file']['size'] = $gallery_images['size'][$i];

                    $config['upload_path'] = './uploads/image/produk/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = 12048; // 2 MB
                    $config['encrypt_name'] = TRUE;
                    $config['file_name'] = 'gallery_' . time() . '_' . $_FILES['file']['name'];
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('file')) {
                        $gallery_image_data = $this->upload->data();
                        $gallery_image_path = $gallery_image_data['file_name'];
                        $this->m_barang->insert_gallery_image($product_id, $gallery_image_path);
                    }
                }
            }

            $response['status'] = 'success';
            $response['message'] = 'Data produk berhasil disimpan.';
            $response['redirect'] = base_url('barang');
        }

        echo json_encode($response);
    }

    public function detail($id)
    {
        $data['title'] = "Detail Barang : e-Hiking";

        $data['produk'] = $this->m_barang->get_product_by_id($id);

        if (!$data['produk']) {
            // Handle jika produk tidak ditemukan, bisa redirect atau tampilkan pesan error
            show_404();
        }

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('pelanggan/barang/detail_barang', $data);
        $this->load->view('template/admin/footer', $data);
    }
}

/* End of file Barang.php */
