   
                   <?php
                   // Display orders
                   $total_price = 0; // initialize total price outside the loop

                   if (isset($orders) && is_array($orders)) {
                       // Initialize an array to keep track of displayed orders
                       $displayed_orders = array();
                   
                       foreach ($orders as $order) {
                           $total_price_query = "SELECT SUM(p.product_price * od.quantity) AS total_price FROM orderdetails od JOIN products p ON od.product_id = p.id WHERE od.order_id = :order_id";
                           $total_price_statement = $connection->prepare($total_price_query);
                           $total_price_statement->bindParam(':order_id', $order['id'], PDO::PARAM_INT);
                           $total_price_statement->execute();
                           $total_price_row = $total_price_statement->fetch(PDO::FETCH_ASSOC);
                           $total_price += $total_price_row['total_price'];
                   
                           // Check if the order has already been displayed
                           if (!in_array($order['id'], $displayed_orders)) {
                               // Add the order ID to the displayed orders array
                               $displayed_orders[] = $order['id'];
                   ?>
                               <tr>
                                   <td><?php echo $order['order_date']; ?></td>
                                   <td><?php echo $order['order_status']; ?></td>
                                   <td><?php echo $total_price_row['total_price']; ?></td>
                                   <td class='table-buttons'>
                                       <a href='#orderDetailsModal<?php echo $order['id']; ?>' data-bs-toggle='modal' data-bs-target='#orderDetailsModal<?php echo $order['id']; ?>'>View Details</a>
                                       <?php if ($order['order_status'] == 'Processing'): ?>
                                           <a href='#' class='cancel-order-btn' data-order-id='<?php echo $order['id']; ?>'>Cancel Order</a>
                                       <?php endif; ?>
                                   </td>
                               </tr>
                   <?php
                           }
                       }
                   }
                   ?>