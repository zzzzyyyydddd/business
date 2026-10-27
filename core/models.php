<?php
require_once 'dbConfig.php';

// ==========================================
// PARENT ENTITY: CUSTOMERS
// ==========================================

function insertCustomer($pdo, $customer_name, $contact_number) {
    $sql = "INSERT INTO customers (customer_name, contact_number) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$customer_name, $contact_number]);
}

function getAllCustomers($pdo) {
    $sql = "SELECT * FROM customers ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getCustomerByID($pdo, $customer_id) {
    $sql = "SELECT * FROM customers WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$customer_id]);
    return $stmt->fetch();
}

function updateCustomer($pdo, $customer_id, $customer_name, $contact_number) {
    $sql = "UPDATE customers SET customer_name = ?, contact_number = ? WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$customer_name, $contact_number, $customer_id]);
}

function deleteCustomer($pdo, $customer_id) {
    $sql = "DELETE FROM customers WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$customer_id]);
}


// ==========================================
// CHILD ENTITY: ORDERS
// ==========================================

function insertOrder($pdo, $customer_id, $silog_meal, $drink_choice, $quantity, $total_price) {
    $sql = "INSERT INTO orders (customer_id, silog_meal, drink_choice, quantity, total_price) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$customer_id, $silog_meal, $drink_choice, $quantity, $total_price]);
}

function getOrdersByCustomer($pdo, $customer_id) {
    $sql = "SELECT * FROM orders WHERE customer_id = ? ORDER BY order_date DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$customer_id]);
    return $stmt->fetchAll();
}

function getOrderByID($pdo, $order_id) {
    $sql = "SELECT * FROM orders WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$order_id]);
    return $stmt->fetch();
}

function updateOrder($pdo, $order_id, $silog_meal, $drink_choice, $quantity, $total_price) {
    $sql = "UPDATE orders 
            SET silog_meal = ?, drink_choice = ?, quantity = ?, total_price = ? 
            WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$silog_meal, $drink_choice, $quantity, $total_price, $order_id]);
}

function deleteOrder($pdo, $order_id) {
    $sql = "DELETE FROM orders WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$order_id]);
}
?>