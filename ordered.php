<?php
session_start();
require 'dbconnection.php';
$db = new db();

if(isset($_POST['submit_order']) && !empty($_SESSION['cart'])) {
    $orderData = [
        'quantity' => $_POST['quantity'],
        'product_name' => $_POST['product_name'],
        'notes' => $_POST['notes'],
        'room_selection' => $_POST['room_selection'],
    ];

    // Insert into orders
    $user_id = 8;
    $ext_number = 1;
    var_dump($orderData['notes']);

    $query = "INSERT INTO orders (user_id, notes, room_number, ext_number) VALUES (?, ?, ?, ?)";
    $stmt = $db->get_connection()->prepare($query);
    $stmt->bind_param("isii", $user_id, $orderData['notes'], $orderData['room_selection'], $ext_number);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    foreach($_SESSION['cart'] as $product) {
        $db->insert_data('orderdetails', ['product_id', 'order_id', 'quantity'], [$product['product_id'], $order_id, $product['quantity']]);
    }

    // Clear the cart   
    $_SESSION['cart'] = [];

    // header('Location: user.php');
    exit(); 
}
?>
<!-- 
        $query = "INSERT INTO orders (user_id, notes, room_number, ext_number) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($db->get_connection(), $query);
        mysqli_stmt_bind_param($stmt, "isii", $user_id, $notes, $roomSelection, $ext_number);
        mysqli_stmt_execute($stmt);
        $order_id = mysqli_insert_id($db->get_connection());
        var_dump($order_id);
        var_dump($orderData);
        foreach($cart as $product) {
            $product_id = $product['product_id'];
            $quantity = $product['quantity'];
            $db->insert_data('orderdetails', ['product_id', 'order_id', 'quantity'], [$product_id, $order_id, $quantity]);
        }

        // Clear the cart   
        $_SESSION['cart'] = [];
        header('Location: user.php');
        exit(); // Ensure script stops after redirection
    }  
}
?> -->
