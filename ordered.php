<?php
session_start();
require 'dbconnection.php';
$db = new db();

if(isset($_POST['submit_order'])) {
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $notes = $_POST['notes'];
        $roomSelection = $_POST['room_selection'];
        $totalPrice = $_POST['total_price'];

        

        $orderData = [
            'notes' => $notes,
            'room_selection' => $roomSelection,
            'total_price' => $totalPrice
        ];

       // $orderId = $db->insert_data('orders', array_keys($orderData), array_values($orderData));

        foreach($_SESSION['cart'] as $item) {
            $orderItemData = [
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'total_price' => $item['total_price'],
            ];
            echo"<pre>";
            var_dump($orderData);
            echo"</pre>";
//$db->insert_data('order_items', array_keys($orderItemData), array_values($orderItemData));
        }

        unset($_SESSION['cart']);

        echo "Order placed successfully!";
    } else {
        echo "Your cart is empty.";
    }
}
?>
