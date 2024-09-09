<?php
class M_barang extends CI_Model
{
    public function insert_product($judul_produk, $kode_produk, $deskripsi_produk, $harga_produk, $id_kategori, $main_image_path)
    {
        $data = array(
            'judul_produk' => $judul_produk,
            'kode_produk' => $kode_produk,
            'deskripsi_produk' => $deskripsi_produk,
            'harga_produk' => $harga_produk,
            'id_kategori' => $id_kategori,
            'gambar' => $main_image_path,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('produk', $data);
        return $this->db->insert_id(); // Mengembalikan ID produk yang baru ditambahkan
    }

    public function insert_gallery_image($product_id, $gallery_image_path)
    {
        $data = array(
            'id_produk' => $product_id,
            'galeri_foto' => $gallery_image_path
        );

        $this->db->insert('galeri', $data);
    }

    public function get_product_by_id($id)
    {
        // $this->db->select('produk.*, galeri.galeri_foto');
        // $this->db->from('produk');
        // $this->db->join('galeri', 'galeri.id_produk = produk.id_produk', 'left'); // Adjust join condition as needed
        // $this->db->where('produk.id_produk', $id);

        // $query = $this->db->get();
        // return $query->row_array();
        // Ambil produk dari tabel 'products'
        $this->db->where('id_produk', $id);
        $query = $this->db->get('produk');
        $produk = $query->row_array();

        if ($produk) {
            // Ambil galeri foto dari tabel 'gallery' berdasarkan produk_id
            $this->db->where('id_produk', $id);
            $query = $this->db->get('galeri');
            $produk['galeri'] = $query->result_array();
        }

        return $produk;
    }

    public function get_all_products()
    {
        $this->db->select('produk.*, kategori.kategori'); // Pilih semua kolom dari produk dan kolom nama_kategori dari kategori
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori'); // Lakukan join tabel kategori dengan produk
        $query = $this->db->get(); // Eksekusi query
        return $query->result_array(); // Kembalikan hasil dalam bentuk array
    }

    public function check_stock($id)
    {
        $product = $this->get_product($id);
        return $product['stok'];
    }

    public function update_stock($id, $quantity)
    {
        $this->db->set('stok', 'stok - ' . (int)$quantity, FALSE);
        $this->db->where('id_produk', $id);
        $this->db->update('produk');
    }

    public function get_product($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
    }


    public function generate_product_code()
    {
        $this->db->select('RIGHT(kode_produk, 4) as code', FALSE);
        $this->db->order_by('kode_produk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('produk');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $code = intval($data->code) + 1;
        } else {
            $code = 1;
        }
        $kode = str_pad($code, 4, "0", STR_PAD_LEFT);
        return 'PROD#' . $kode;
    }
}
