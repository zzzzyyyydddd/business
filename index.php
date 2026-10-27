<?php
require_once 'core/models.php';
$customers = getAllCustomers($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Silogan Management System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; padding: 15px; border: 1px solid #ccc; width: 350px; }
        input { width: 100%; margin-bottom: 10px; padding: 8px; box-sizing: border-box; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; color: blue; }
        .delete-btn { color: red; }
    </style>
</head>
<body>

    <h2>Add New Customer</h2>
    <form action="core/handleForms.php" method="POST">
        <label>Customer Name:</label>
        <input type="text" name="customer_name" required>
        
        <label>Contact Number:</label>
        <input type="text" name="contact_number" required>
        
        <input type="submit" name="addCustomerBtn" value="Add Customer">
    </form>

    <h2>Registered Customers</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Contact Number</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= $customer['customer_id']; ?></td>
            <td><?= htmlspecialchars($customer['customer_name']); ?></td>
            <td><?= htmlspecialchars($customer['contact_number']); ?></td>
            <td><?= $customer['created_at']; ?></td>
            <td>
                <a href="add_order.php?customer_id=<?= $customer['customer_id']; ?>">View/Add Orders</a> | 
                <a href="edit_customer.php?customer_id=<?= $customer['customer_id']; ?>">Edit</a> | 
                <a href="core/handleForms.php?deleteCustomer=<?= $customer['customer_id']; ?>" class="delete-btn" onclick="return confirm('Deleting customer will also delete their orders. Proceed?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>