<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
</head>

<body>
    <h1>Checkout</h1>
    <p>Initial Payment: <?php echo $initial_payment; ?></p>
    <p>Rental Duration: 7 days</p> <!-- Ganti sesuai dengan durasi penyewaan -->
    <form method="post" action="<?php echo site_url('cart/process_initial_payment'); ?>">
        <input type="hidden" name="transaction_id" value="<?php echo $transaction_id; ?>">
        <label>Initial Payment Amount:</label>
        <input type="number" name="amount" step="0.01" required>
        <input type="submit" value="Pay Initial Payment">
    </form>
</body>

</html>