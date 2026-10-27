<?php
require_once 'models.php';

// Create Customer
if (isset($_POST['addCustomerBtn'])) {
    $customer_name = trim($_POST['customer_name']);
    $contact_number = trim($_POST['contact_number']);

    if (!empty($customer_name) && !empty($contact_number)) {
        if (insertCustomer($pdo, $customer_name, $contact_number)) {
            header("Location: ../index.php");
            exit();
        }
    }
}

// Edit Customer
if (isset($_POST['editCustomerBtn'])) {
    $customer_id = $_POST['customer_id'];
    $customer_name = trim($_POST['customer_name']);
    $contact_number = trim($_POST['contact_number']);

    if (updateCustomer($pdo, $customer_id, $customer_name, $contact_number)) {
        header("Location: ../index.php");
        exit();
    }
}

// Delete Customer
if (isset($_GET['deleteCustomer'])) {
    $customer_id = $_GET['deleteCustomer'];
    if (deleteCustomer($pdo, $customer_id)) {
        header("Location: ../index.php");
        exit();
    }
}

// Create Order
if (isset($_POST['addOrderBtn'])) {
    $customer_id = $_POST['customer_id'];
    $silog_meal = trim($_POST['silog_meal']);
    $drink_choice = trim($_POST['drink_choice']);
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];

    if (insertOrder($pdo, $customer_id, $silog_meal, $drink_choice, $quantity, $total_price)) {
        header("Location: ../add_order.php?customer_id=" . $customer_id);
        exit();
    }
}

// Edit Order
if (isset($_POST['editOrderBtn'])) {
    $order_id = $_POST['order_id'];
    $customer_id = $_POST['customer_id'];
    $silog_meal = trim($_POST['silog_meal']);
    $drink_choice = trim($_POST['drink_choice']);
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];

    if (updateOrder($pdo, $order_id, $silog_meal, $drink_choice, $quantity, $total_price)) {
        header("Location: ../add_order.php?customer_id=" . $customer_id);
        exit();
    }
}

// Delete Order
if (isset($_GET['deleteOrder'])) {
    $order_id = $_GET['deleteOrder'];
    $customer_id = $_GET['customer_id'];

    if (deleteOrder($pdo, $order_id)) {
        header("Location: ../add_order.php?customer_id=" . $customer_id);
        exit();
    }
}
?>