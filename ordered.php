<?php
session_start();
require 'dbconnection.php';
$db = new db();
echo"<pre>";
var_dump($_POST);
echo"</pre>";

if(isset($_POST['submit_order'])) {
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $notes = $_POST['notes'];
        $roomSelection = $_POST['room_selection'];
        $quantity = $_POST['quantity'];
        $product_name = $_POST['product_name'];
        $orderData = [
            'quantity' =>$quantity,
            'product_name'=>$product_name,
            'notes' => $notes,
            'room_selection' => $roomSelection,
        ];
        echo"<pre>";
        var_dump($orderData);
        echo"</pre>";
        unset($_SESSION['cart']);
        header('Location: user.php');
    }  
}
?>
