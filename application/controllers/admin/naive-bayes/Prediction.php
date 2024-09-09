<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediction extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('NaiveBayesModel');
    }

    public function index()
    {
        $startDate = $this->input->post('start_date');
        $endDate = $this->input->post('end_date');
        $quanty = $this->input->post('quanty');
        $price = $this->input->post('price');

        // Validasi input
        if (!$this->validate_dates($startDate, $endDate)) {
            $this->load->view('prediction_view', ['error' => 'Tanggal tidak valid.']);
            return;
        }

        // Train model dengan data dalam rentang tanggal
        $this->naivebayesmodel->train($startDate, $endDate);

        // Lakukan prediksi
        $prediction = $this->naivebayesmodel->predict($quanty, $price);

        // Load view untuk menampilkan hasil
        $this->load->view('prediction_view', [
            'prediction' => $prediction,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'quanty' => $quanty,
            'price' => $price
        ]);
    }

    private function validate_dates($startDate, $endDate)
    {
        return $startDate && $endDate && $startDate <= $endDate;
    }
}
