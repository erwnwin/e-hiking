<!DOCTYPE html>
<html>

<head>
    <title>Final Payment</title>
</head>

<body>
    <h1>Final Payment</h1>
    <?php
    $transaction = $this->Transaction_model->get_transaction($transaction_id);
    $late_fee = $this->Transaction_model->calculate_late_fee($transaction_id);
    $total_due = $transaction['final_payment'] + $late_fee;
    ?>
    <p>Final Payment: <?php echo $transaction['final_payment']; ?></p>
    <p>Late Fee: <?php echo $late_fee; ?></p>
    <p>Total Due: <?php echo $total_due; ?></p>
    <form method="post" action="<?php echo site_url('cart/process_final_payment'); ?>">
        <input type="hidden" name="transaction_id" value="<?php echo $transaction_id; ?>">
        <label>Final Payment Amount:</label>
        <input type="number" name="amount" step="0.01" required>
        <input type="submit" value="Pay Final Payment">
    </form>
</body>

</html>