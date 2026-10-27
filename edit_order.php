<?php
require_once 'core/models.php';
$order = getOrderByID($pdo, $_GET['order_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
</head>
<body>
    <h2>Edit Order ID #<?= $order['order_id']; ?></h2>
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="order_id" value="<?= $order['order_id']; ?>">
        <input type="hidden" name="customer_id" value="<?= $order['customer_id']; ?>">

        <label>Silog Meal Choice:</label><br>
        <input type="text" name="silog_meal" value="<?= htmlspecialchars($order['silog_meal']); ?>" required><br><br>

        <label>Drink Choice:</label><br>
        <input type="text" name="drink_choice" value="<?= htmlspecialchars($order['drink_choice']); ?>"><br><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" value="<?= $order['quantity']; ?>" required><br><br>

        <label>Total Price:</label><br>
        <input type="number" step="0.01" name="total_price" value="<?= $order['total_price']; ?>" required><br><br>

        <input type="submit" name="editOrderBtn" value="Update Order">
        <a href="add_order.php?customer_id=<?= $order['customer_id']; ?>">Cancel</a>
    </form>
</body>
</html>