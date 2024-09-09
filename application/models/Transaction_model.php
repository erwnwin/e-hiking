<?php
class Transaction_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function create_transaction($data)
    {
        $this->db->insert('transactions', $data);
        return $this->db->insert_id();
    }

    public function update_transaction_status($transaction_id, $status)
    {
        $this->db->where('id', $transaction_id);
        $this->db->update('transactions', array('status' => $status));
    }

    public function get_transaction($transaction_id)
    {
        $query = $this->db->get_where('transactions', array('id' => $transaction_id));
        return $query->row_array();
    }

    public function get_transaction_details($transaction_id)
    {
        $this->db->select('products.id, products.name, transaction_details.quantity, transaction_details.price');
        $this->db->join('products', 'products.id = transaction_details.product_id');
        $query = $this->db->get_where('transaction_details', array('transaction_id' => $transaction_id));
        return $query->result_array();
    }

    public function create_transaction_detail($data)
    {
        return $this->db->insert('transaction_details', $data);
    }

    public function calculate_late_fee($transaction_id)
    {
        $transaction = $this->get_transaction($transaction_id);
        $today = new DateTime();
        $due_date = new DateTime($transaction['due_date']);
        $late_fee = 0;

        if ($today > $due_date) {
            $late_days = $today->diff($due_date)->days;
            $late_fee = $late_days * 5.00;  // Denda 5.00 per hari
            $late_fee_data = array(
                'transaction_id' => $transaction_id,
                'amount' => $late_fee,
                'date' => $today->format('Y-m-d H:i:s')
            );
            $this->db->insert('late_fees', $late_fee_data);
        }

        return $late_fee;
    }


    public function update_status($transaction_id, $status)
    {
        $this->db->where('id', $transaction_id);
        return $this->db->update('transactions', ['status' => $status]);
    }
}
