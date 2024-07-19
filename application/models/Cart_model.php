<?php
class Cart_model extends CI_Model
{

    public function insert_cart($data)
    {
        $this->db->insert('cart', $data);
    }

    public function remove_cart($cart_id)
    {
        $this->db->where('id', $cart_id);
        $this->db->delete('cart');
    }

    public function update_cart_quantity($product_id, $quantity)
    {
        $this->db->where('product_id', $product_id);
        $this->db->update('cart', ['quantity' => $quantity]);
    }


    public function get_cart_items()
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');

        $this->db->select('cart.*, produk.judul_produk, produk.harga_produk');
        $this->db->from('cart');
        $this->db->join('produk', 'produk.id_produk = cart.product_id');
        $this->db->where('cart.id_pelanggan', $id_pelanggan);
        // $this->db->where('pelanggan', 'cart.id_pelanggan = cart.product_id');
        return $this->db->get()->result_array();
    }

    public function get_cart_item($product_id)
    {
        $this->db->where('product_id', $product_id);
        return $this->db->get('cart')->row_array();
    }

    public function insert_transaction($data)
    {
        $this->db->insert('transactions', $data);
        return $this->db->insert_id();
    }

    public function calculate_penalty($rental_end_date)
    {
        $current_date = new DateTime();
        $rental_end_date = new DateTime($rental_end_date);
        $interval = $current_date->diff($rental_end_date);

        if ($interval->invert) {
            $days_late = $interval->days;
            $penalty_per_day = 5000; // Contoh biaya denda per hari
            return $days_late * $penalty_per_day;
        } else {
            return 0;
        }
    }

    public function insert_transaction_item($data)
    {
        $this->db->insert('transaction_items', $data);
    }

    public function clear_cart()
    {
        $this->db->empty_table('cart');
    }

    public function deduct_product_stock($product_id, $quantity)
    {
        // Fetch current stock quantity
        $current_stock = $this->db->get_where('produk', ['id_produk' => $product_id])->row()->stock;

        // Calculate new stock quantity
        $new_stock = $current_stock - $quantity;

        // Update stock in database
        $this->db->where('id_produk', $product_id);
        $this->db->update('produk', ['stok' => $new_stock]);

        return true; // Return true or handle errors as needed
    }
}
