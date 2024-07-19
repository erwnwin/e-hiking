<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewa_model extends CI_Model
{

    public function simpan_penyewaan($data)
    {
        // Simpan data penyewaan ke database
        $this->db->insert('penyewaan', $data);
        return $this->db->insert_id();
    }

    public function update_penyewaan($id_penyewaan, $data)
    {
        // Update data penyewaan berdasarkan ID
        $this->db->where('id_penyewaan', $id_penyewaan);
        $this->db->update('penyewaan', $data);
    }

    public function hitung_denda($id_penyewaan, $tanggal_kembali)
    {
        // Ambil tanggal kembali dan batas waktu dari database
        $this->db->select('tanggal_kembali, batas_waktu');
        $this->db->from('penyewaan');
        $this->db->where('id_penyewaan', $id_penyewaan);
        $query = $this->db->get();
        $result = $query->row();

        $tanggal_kembali_asli = new DateTime($result->tanggal_kembali);
        $tanggal_kembali_sekarang = new DateTime($tanggal_kembali);

        // Hitung selisih hari
        $selisih_hari = $tanggal_kembali_asli->diff($tanggal_kembali_sekarang)->days;

        // Ambil batas waktu
        $batas_waktu = $result->batas_waktu;

        // Hitung denda
        $denda = 0;
        if ($tanggal_kembali_sekarang > $tanggal_kembali_asli) {
            $denda = ($selisih_hari - $batas_waktu) * 50000; // Misalnya, denda Rp 50.000 per hari terlambat
        }

        return $denda;
    }

    public function simpan_detail_penyewaan($data)
    {
        // Simpan detail penyewaan (barang yang disewa) ke database
        $this->db->insert('detail_penyewaan', $data);
    }

    public function update_stok_barang($id_barang, $jumlah)
    {
        // Update stok barang setelah transaksi penyewaan
        $this->db->set('stok', 'stok - ' . $jumlah, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang');
    }
}
