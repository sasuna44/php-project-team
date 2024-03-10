<?php
include 'database_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if start_date and end_date are set and not empty
    if (isset($_POST['start_date']) && isset($_POST['end_date']) && !empty($_POST['start_date']) && !empty($_POST['end_date'])) {
        // Get start_date and end_date values from the form
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // Prepare and execute the SQL query
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
        // Handle the case when start_date or end_date is empty
        $error_message = "Please provide both start and end dates.";
    }
}
?>
