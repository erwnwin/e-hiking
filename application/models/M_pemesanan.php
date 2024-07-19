<?php
class M_pemesanan extends CI_Model
{
    public function add_pemesanan($data)
    {
        $this->db->insert('pemesanan', $data);
        return $this->db->insert_id();
    }

    public function update_pemesanan($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pemesanan', $data);
    }

    public function get_status()
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');

        $this->db->select('*');
        $this->db->from('transactions');
        // $this->db->join('produk', 'produk.id_produk = cart.product_id');
        $this->db->where('transactions.id_pelanggan', $id_pelanggan);
        $this->db->where('transactions.status', 'pending');
        return $this->db->get()->result_array();
    }

    public function get_detail_transaksi()
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');

        $this->db->select('transaction_items.*, produk.judul_produk, produk.harga_produk, transactions.rental_end_date');
        $this->db->from('transaction_items');
        $this->db->join('produk', 'produk.id_produk = transaction_items.product_id');
        $this->db->join('transactions', 'transactions.id = transaction_items.transaction_id');
        $this->db->where('transaction_items.id_pelanggan', $id_pelanggan);
        return $this->db->get()->result_array();
    }
}
