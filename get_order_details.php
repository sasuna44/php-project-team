<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to the database
$connection = new PDO("mysql:host=localhost;dbname=php", "root", "1234");
 
// Start the session
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['start_date']) && isset($_POST['end_date']) && !empty($_POST['start_date']) && !empty($_POST['end_date'])) {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $query = "SELECT o.id, o.order_date, o.total_price, o.order_status, od.quantity, p.product_name, p.product_image, od.product_id
        FROM orders o
        LEFT JOIN orderdetails od ON o.id = od.order_id
        LEFT JOIN products p ON od.product_id = p.id
        WHERE o.order_date BETWEEN :start_date AND :end_date";

        $statement = $connection->prepare($query);
        $statement->bindParam(':start_date', $start_date);
        $statement->bindParam(':end_date', $end_date);
        $statement->execute();
        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $error_message = "Please provide both start and end dates.";
    }
} else {
    $query = "SELECT o.id, o.order_date, o.order_status, od.quantity, p.product_name, p.product_image, od.product_id
    FROM orders o
    LEFT JOIN orderdetails od ON o.id = od.order_id
    LEFT JOIN products p ON od.product_id = p.id";
    
    $statement = $connection->query($query);
    $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_GET['cancel_order']) && isset($_GET['order_id'])) {
    $order_id = filter_var($_GET['order_id'], FILTER_SANITIZE_NUMBER_INT);
    $delete_order_query = "DELETE FROM orders WHERE id = :order_id";
    $delete_order_statement = $connection->prepare($delete_order_query);
    $delete_order_statement->bindParam(':order_id', $order_id, PDO::PARAM_INT);

    if ($delete_order_statement->execute()) {
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Failed to cancel the order. Please try again.";
    }
}
?>
