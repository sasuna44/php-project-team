<?php
// Establish database connection
$connection = new PDO("mysql:host=localhost;dbname=php", "root", "1234");

// Fetch orders and their details from the database
$orders_query = "SELECT orders.*, users.user_name 
                FROM orders 
                JOIN users ON orders.user_id = users.id 
                WHERE orders.order_status IN ('Done', 'Out for delivery')";
$orders_result = $connection->query($orders_query);

// Display orders and their details
$row_count = 0; // Initialize row count outside the loop
while ($row = $orders_result->fetch(PDO::FETCH_ASSOC)) {
    // Increment row count inside the loop
    $row_count++;

    // Determine row color based on row count
    $row_color = ($row_count % 2 == 0) ? 'even-color' : 'odd-color';
?>

    <tr class="<?php echo $row_color; ?>">
        <td><?php echo "Order: " . $row_count; ?></td>
        <td><?php echo $row['order_date']; ?></td>
        <td><?php echo $row['user_name']; ?></td>
        <td><?php echo $row['room_number']; ?></td>
        <td><?php echo $row['ext_number']; ?></td>
        <td><?php echo $row['order_status']; ?></td>
    </tr>

    <tr class="<?php echo $row_color; ?>">
        <!-- Second row for images -->
        <td colspan="6" class="image-row">
            <?php
            // Fetch order details for this order
            $order_id = $row['id'];
            $order_details_query = "SELECT od.quantity, p.product_name, p.product_image, p.product_price 
                                    FROM orderdetails od 
                                    JOIN products p ON od.product_id = p.id 
                                    WHERE od.order_id = $order_id";
            $order_details_result = $connection->query($order_details_query);

            // Initialize variables to store images and details
            $images_html = "<div class='image-container'>";

            // Iterate through order details to populate images and details
            while ($detail = $order_details_result->fetch(PDO::FETCH_ASSOC)) {
                // Accumulate images and details HTML
                $images_html .= "<div class='image-item'>";
                $images_html .= "<div class='product-image-container'>";
                $images_html .= "<img src='" . $detail['product_image'] . "' alt='" . $detail['product_name'] . "' class='product-image'>";
                $images_html .= "<div class='product-details'>";
                $images_html .= "<p>Quantity: " . $detail['quantity'] . "</p>";
                $images_html .= "<p>Price: EGP " . $detail['product_price'] . "</p>";
                $images_html .= "</div>";
                $images_html .= "</div>";
                $images_html .= "</div>";
            }
            $images_html .= "</div>";
            echo $images_html;
            ?>
        </td>
    </tr>

    <tr class="<?php echo $row_color; ?>">
        <!-- Third row for total price -->
        <td colspan="6" class="total-price">
            <?php
            // Fetch and calculate total price for this order
            $total_price_query = "SELECT SUM(p.product_price * od.quantity) AS total_price 
                                  FROM orderdetails od 
                                  JOIN products p ON od.product_id = p.id 
                                  WHERE od.order_id = $order_id";
            $total_price_result = $connection->query($total_price_query);
            $total_price_row = $total_price_result->fetch(PDO::FETCH_ASSOC);
            $total_price = $total_price_row['total_price'];
            echo "Total Price: EGP " . $total_price;
            ?>
        </td>
    </tr>

<?php
} // End of while loop for orders
?>

<?php
// Close database connection
$connection = null;
?>
