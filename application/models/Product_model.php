<?php
class Product_model extends CI_Model
{

    public function get_all_products()
    {
        return $this->db->get('produk')->result_array();
    }

    public function get_product($product_id)
    {
        $this->db->where('id_produk', $product_id);
        return $this->db->get('produk')->row_array();
    }

    public function update_stock($product_id, $new_stock)
    {
        $this->db->set('stok', $new_stock);
        $this->db->where('id_produk', $product_id);
        $this->db->update('produk');

        // Periksa apakah pembaruan berhasil
        return $this->db->affected_rows() > 0;
    }

    public function get_stock($product_id)
    {
        $this->db->select('stok'); // Assuming 'stok' is the column name for stock in your database
        $this->db->where('id_produk', $product_id); // Adjust 'id_produk' based on your actual column name

        $query = $this->db->get('produk'); // Assuming 'produk' is your table name
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->stok; // Return the stock quantity
        } else {
            return 0; // Return 0 or handle as needed when product is not found
        }
    }
}
