<?php
require_once 'core/models.php';
$customer = getCustomerByID($pdo, $_GET['customer_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
</head>
<body>
    <h2>Edit Customer</h2>
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="customer_id" value="<?= $customer['customer_id']; ?>">
        
        <label>Customer Name:</label><br>
        <input type="text" name="customer_name" value="<?= htmlspecialchars($customer['customer_name']); ?>" required><br><br>
        
        <label>Contact Number:</label><br>
        <input type="text" name="contact_number" value="<?= htmlspecialchars($customer['contact_number']); ?>" required><br><br>
        
        <input type="submit" name="editCustomerBtn" value="Update Customer">
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>