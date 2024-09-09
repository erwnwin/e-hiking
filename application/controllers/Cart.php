<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_model');
        $this->load->model('Product_model');
    }

    public function index()
    {

        $data['title'] = "Form Penyewaan : e-Hiking";

        $data['produk'] = $this->Product_model->get_all_products();


        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('pelanggan/penyewaan/cart_view', $data);
        $this->load->view('layouts/footer', $data);

        // $this->load->view('cart_view', $data);
    }

    public function add_to_cart()
    {
        $product_id = $this->input->post('product_id');
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $quantity = $this->input->post('quantity');
        $product = $this->Product_model->get_product($product_id);

        if ($quantity > $product['stok']) {
            echo json_encode(['status' => 'error', 'message' => 'Stock not sufficient']);
        } else {
            $cart_item = $this->Cart_model->get_cart_item($product_id);

            if ($cart_item) {
                // Update quantity if product already in cart
                $new_quantity = $cart_item['quantity'] + $quantity;
                $this->Cart_model->update_cart_quantity($product_id, $new_quantity);
            } else {
                // Insert new cart item
                $data = array(
                    'product_id' => $product_id,
                    'id_pelanggan' => $id_pelanggan,
                    'quantity' => $quantity
                );
                $this->Cart_model->insert_cart($data);
            }

            echo json_encode([
                'status' => 'success',
                'message' => 'Menambahkan ke Keranjang Sewa',
                'redirect' => base_url('form-penyewaan')
            ]);
        }
    }

    public function remove_from_cart()
    {
        $cart_id = $this->input->post('cart_id');
        $this->Cart_model->remove_cart($cart_id);
        echo json_encode(['status' => 'success', 'message' => 'Berhasil dihapus dari keranjang']);
    }

    public function get_cart_items()
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan'); // Ambil ID pelanggan dari sesi
        $cart_items = $this->Cart_model->get_cart_items($id_pelanggan);
        // $data['cart_items'] = $this->Cart_model->get_cart_items_by_pelanggan($id_pelanggan);

        // $this->load->view('template/admin/head', $data);
        // $this->load->view('template/admin/navbar', $data);
        // $this->load->view('cart_items', ['cart_items' => $cart_items]);
        $this->load->view('pelanggan/penyewaan/cart_items', ['cart_items' => $cart_items]);
        // $this->load->view('template/admin/footer', $data);
    }

    public function checkout()
    {
        $cart_items = $this->Cart_model->get_cart_items();

        $data['title'] = "Form Checkout Penyewaan : e-Hiking";

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('pelanggan/penyewaan/checkout', ['cart_items' => $cart_items]);
        $this->load->view('layouts/footer');


        // $this->load->view('checkout', ['cart_items' => $cart_items]);
    }


    public function check_penalty()
    {
        $rental_end_date = $this->input->post('rental_end_date');
        $penalty = $this->Cart_model->calculate_penalty($rental_end_date);

        echo json_encode(['penalty' => $penalty]);
    }



    public function pay_initial_payment()
    {
        // Ambil data dari POST
        $amount = $this->input->post('initial_payment');
        $rental_duration = $this->input->post('rental_duration');
        $id_pelanggan = $this->session->userdata('id_pelanggan');

        // Validasi file bukti pembayaran
        if (empty($_FILES['proof_of_payment']['name'])) {
            echo json_encode(['status' => 'error', 'message' => 'Harap upload bukti pembayaran']);
            return;
        }

        // Proses Upload Gambar
        $config['upload_path'] = './uploads/bukti/'; // Tentukan direktori penyimpanan
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Jenis file yang diizinkan
        $config['max_size'] = 2048; // Ukuran maksimum file dalam KB (2MB)
        $config['file_name'] = time() . '_' . $_FILES['proof_of_payment']['name']; // Nama file yang diupload

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('proof_of_payment')) {
            echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
            return;
        }

        // Jika upload berhasil, dapatkan nama file
        $upload_data = $this->upload->data();
        $proof_of_payment = $upload_data['file_name'];

        $cart_items = $this->Cart_model->get_cart_items();

        if (empty($cart_items)) {
            echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
            return;
        }

        // Memulai transaksi database
        $this->db->trans_begin();

        try {
            // Validasi stok sebelum mengurangi
            foreach ($cart_items as $item) {
                // Ambil stok saat ini dari database untuk produk tertentu
                $current_stock = $this->Product_model->get_stock($item['product_id']);

                // Validasi stok sebelum mengurangi
                if ($current_stock < $item['quantity']) {
                    // Stok tidak mencukupi untuk produk tertentu
                    throw new Exception('Insufficient stock for product: ' . $item['product_id']);
                }

                // Mengurangi stok barang
                $new_stock = $current_stock - $item['quantity'];
                $this->Product_model->update_stock($item['product_id'], $new_stock);
            }

            // Hitung tanggal akhir sewa berdasarkan durasi sewa
            $rental_end_date = date('Y-m-d', strtotime("+$rental_duration days"));

            // Masukkan data transaksi
            $transaction_id = $this->Cart_model->insert_transaction([
                'initial_payment' => $amount,
                'rental_duration' => $rental_duration,
                'rental_end_date' => $rental_end_date,
                'id_pelanggan' => $id_pelanggan,
                'status' => 'pending' // Tandai sebagai pending sampai pembayaran penuh dilakukan
            ]);

            // Masukkan setiap item keranjang ke dalam tabel transaction_items
            foreach ($cart_items as $item) {
                $this->Cart_model->insert_transaction_item([
                    'transaction_id' => $transaction_id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'id_pelanggan' => $id_pelanggan,
                    'price' => $item['harga_produk']
                ]);
            }

            // Simpan data bukti bayar ke tabel bukti_bayar
            $this->db->insert('bukti_bayar', [
                'id_pelanggan' => $id_pelanggan,
                'transaction_id' => $transaction_id,
                'gambar_bukti_bayar' => $proof_of_payment
            ]);

            // Bersihkan keranjang
            $this->Cart_model->clear_cart();

            // Commit transaksi database
            $this->db->trans_commit();

            echo json_encode([
                'status' => 'success',
                'message' => 'Pembayaran Awal telah dilakukan. Menunggu konfirmasi toko',
                'redirect' => base_url('barang'),
            ]);
        } catch (Exception $e) {
            // Rollback jika ada kesalahan
            $this->db->trans_rollback();
            echo json_encode(['status' => 'error', 'message' => 'Transaction failed: ' . $e->getMessage()]);
        }
    }



    // public function pay_initial_payment()
    // {
    //     $amount = $this->input->post('initial_payment');
    //     $rental_duration = $this->input->post('rental_duration');
    //     $cart_items = $this->Cart_model->get_cart_items();

    //     if (empty($cart_items)) {
    //         echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
    //         return;
    //     }

    //     // Calculate the rental end date based on the rental duration
    //     $rental_end_date = date('Y-m-d', strtotime("+$rental_duration days"));

    //     // Handle file upload for proof of payment
    //     $upload_path = './uploads/bukti/';
    //     $config['upload_path'] = $upload_path;
    //     $config['max_size'] = 5048; // 2MB
    //     $config['encrypt_name'] = TRUE;
    //     $config['allowed_types'] = 'jpg|jpeg|png|pdf'; // Adjust allowed file types as needed
    //     $this->load->library('upload', $config);

    //     if (!$this->upload->do_upload('proof_of_payment')) {
    //         $error = array('error' => $this->upload->display_errors());
    //         echo json_encode(['status' => 'error', 'message' => 'Proof of payment upload failed', 'error' => $error]);
    //         return;
    //     } else {
    //         $upload_data = $this->upload->data();
    //         $proof_file_name = $upload_data['file_name'];
    //     }

    //     // Insert transaction data
    //     $transaction_id = $this->Cart_model->insert_transaction([
    //         'initial_payment' => $amount,
    //         'rental_duration' => $rental_duration,
    //         'rental_end_date' => $rental_end_date,
    //         'proof_of_payment' => $proof_file_name,
    //         'status' => 'pending' // Mark as pending until full payment is made
    //     ]);

    //     // Insert each cart item into the transaction_items table
    //     foreach ($cart_items as $item) {
    //         $this->Cart_model->insert_transaction_item([
    //             'transaction_id' => $transaction_id,
    //             'product_id' => $item['product_id'],
    //             'quantity' => $item['quantity'],
    //             'price' => $item['harga_produk']
    //         ]);
    //     }

    //     // Clear the cart
    //     $this->Cart_model->clear_cart();

    //     echo json_encode(
    //         [
    //             'status' => 'success',
    //             'message' => 'Pembayaran Awal telah dilakukan. Menunggu konfirmasi toko',
    //             'redirect' => base_url('barang'),
    //         ]
    //     );
    // }

    // public function pay_initial_payment()
    // {
    //     // Ambil data dari POST
    //     $amount = $this->input->post('initial_payment');
    //     $rental_duration = $this->input->post('rental_duration');
    //     // $proof_of_payment = ''; // Jika memanggil file proof_of_payment, perlu di edit

    //     $cart_items = $this->Cart_model->get_cart_items();

    //     if (empty($cart_items)) {
    //         echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
    //         return;
    //     }

    //     // Memulai transaksi database
    //     $this->db->trans_begin();

    //     try {
    //         // Validasi stok sebelum mengurangi
    //         foreach ($cart_items as $item) {
    //             // Ambil stok saat ini dari database untuk produk tertentu
    //             $current_stock = $this->Product_model->get_stock($item['product_id']);

    //             // Validasi stok sebelum mengurangi
    //             if ($current_stock < $item['quantity']) {
    //                 // Stok tidak mencukupi untuk produk tertentu
    //                 throw new Exception('Insufficient stock for product: ' . $item['product_id']);
    //             }

    //             // Mengurangi stok barang
    //             $new_stock = $current_stock - $item['quantity'];
    //             $this->Product_model->update_stock($item['product_id'], $new_stock);
    //         }

    //         // Hitung tanggal akhir sewa berdasarkan durasi sewa
    //         $rental_end_date = date('Y-m-d', strtotime("+$rental_duration days"));

    //         // Masukkan data transaksi
    //         $transaction_id = $this->Cart_model->insert_transaction([
    //             'initial_payment' => $amount,
    //             'rental_duration' => $rental_duration,
    //             'rental_end_date' => $rental_end_date,
    //             'id_pelanggan' => $this->session->userdata('id_pelanggan'),
    //             'status' => 'pending' // Tandai sebagai pending sampai pembayaran penuh dilakukan
    //         ]);

    //         // Masukkan setiap item keranjang ke dalam tabel transaction_items
    //         foreach ($cart_items as $item) {
    //             $this->Cart_model->insert_transaction_item([
    //                 'transaction_id' => $transaction_id,
    //                 'product_id' => $item['product_id'],
    //                 'quantity' => $item['quantity'],
    //                 'id_pelanggan' => $this->session->userdata('id_pelanggan'),
    //                 'price' => $item['harga_produk']
    //             ]);
    //         }

    //         // Bersihkan keranjang
    //         $this->Cart_model->clear_cart();

    //         // Commit transaksi database
    //         $this->db->trans_commit();

    //         echo json_encode([
    //             'status' => 'success',
    //             'message' => 'Pembayaran Awal telah dilakukan. Menunggu konfirmasi toko',
    //             'redirect' => base_url('barang'),
    //         ]);
    //     } catch (Exception $e) {
    //         // Rollback jika ada kesalahan
    //         $this->db->trans_rollback();
    //         echo json_encode(['status' => 'error', 'message' => 'Transaction failed: ' . $e->getMessage()]);
    //     }
    // }
}
