<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Phpml\Classification\NaiveBayes;

class NaiveBayesModel
{

    protected $classifier;
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->database();
    }

    /**
     * Melatih model Naive Bayes dengan data dalam rentang tanggal.
     *
     * @param string $startDate Tanggal mulai (format YYYY-MM-DD)
     * @param string $endDate Tanggal akhir (format YYYY-MM-DD)
     */
    public function train($startDate, $endDate)
    {
        // Ambil data pelatihan dari database berdasarkan rentang tanggal
        $query = $this->CI->db->query("
            SELECT quanty, price,
                CASE
                    WHEN quanty > 100 THEN 'Laris'
                    ELSE 'Tidak Laris'
                END AS label
            FROM transaction_items
            WHERE tanggal >= ? AND tanggal <= ?
        ", [$startDate, $endDate]);

        $data = $query->result_array();

        $samples = [];
        $labels = [];

        foreach ($data as $row) {
            // Gunakan quanty dan price sebagai fitur
            $samples[] = [$row['quanty'], $row['price']];
            $labels[] = $row['label'];
        }

        // Inisialisasi classifier Naive Bayes
        $this->classifier = new NaiveBayes();
        $this->classifier->train($samples, $labels);
    }

    /**
     * Melakukan prediksi menggunakan model Naive Bayes.
     *
     * @param float $quanty Jumlah (Qty) produk
     * @param float $price Harga barang
     * @return string Hasil prediksi ('Laris' atau 'Tidak Laris')
     */
    public function predict($quanty, $price)
    {
        if ($this->classifier) {
            return $this->classifier->predict([$quanty, $price]);
        } else {
            return 'Model belum dilatih.';
        }
    }
}
