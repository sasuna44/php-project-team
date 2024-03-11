<?php
require 'dbconnection.php';
$db = new db();
session_start();

if(isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['product_id'] === $product_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}
if(isset($_POST['add_to_cart'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_image = $_POST['product_image'];
    $product_price = $_POST['product_price'];

    $cart_item = array(
        'product_id' => $product_id,
        'product_name' => $product_name,
        'product_image' => $product_image,
        'product_price' => $product_price,
        'quantity' => 1 
    );

    if(isset($_SESSION['cart'])){
        $found = false;
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['product_id'] === $product_id) {
                $_SESSION['cart'][$key]['quantity'] += 1; 
                $found = true;
                break;
            }
        }
        if (!$found) {
            $_SESSION['cart'][] = $cart_item;
        }
    } else {
        $_SESSION['cart'] = array($cart_item);
    }
}

?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>user page</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="row m-4">
                    <div class="latest-order d-flex flex-row align-items-center gap-4 p-4">   
                        <h1>latest ordered</h1>
                        <div class="col">
                            <div class="card latest-order-card" style="width: 18rem;">
                                <span>pastery</span>
                                <div class="card-body latest-order-card-body d-flex justify-content-start align-items-end">
                                    <h5 class="card-title">prodcut name</h5>
                                </div>   
                            </div>
                        </div> <!-- end-latest-ordered-card -->
                        <div class="col">
                            <div class="card latest-order-card" style="width: 18rem;">
                                <span>pastery</span>
                                <div class="card-body latest-order-card-body d-flex justify-content-start align-items-end">
                                    <h5 class="card-title">prodcut name</h5>
                                </div>   
                            </div>
                        </div> <!-- end-latest-ordered-card -->
                        <div class="col">
                            <div class="card latest-order-card" style="width: 18rem;">
                                <span>pastery</span>
                                <div class="card-body latest-order-card-body d-flex justify-content-start align-items-end">
                                    <h5 class="card-title">prodcut name</h5>
                                </div>   
                            </div>
                        </div>  <!-- end-latest-ordered-card -->
                    </div>
                </div>
                <div class="row m-4">
                    <div class="container">
                        <div class="row">
                            <div class="product-section">
                                <div class="row justify-content-between flex-wrap">
                                    <?php
                                     

                                        $result = $db->get_data('products');
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<div class="col-sm-12 col-md-6 col-lg-4 my-4  p-0">';
                                            echo '<div class="card card-main-product m-auto border-0">';
                                            echo ' <div class="card-content">';
                                            echo '     <div class="product-price">';
                                            echo '         <span><sup>e£</sup>' . $row['product_price'] . '</span>';
                                            echo "        <div class='card-content-image'>
                                                        <img src='img/" . $row['product_image'] . "'>
                                                    </div>";
                                            echo '     </div>';
                                            echo '     <div class="card-content-details d-flex  flex-column  align-items-center">';
                                            echo '         <div class="product-info px-2">';
                                            echo '             <h6 class="text-center fw-bold m-0">' . $row['product_name'] . '</h6>';
                                            echo '         </div>';
                                            echo '         <div class="product-action d-flex justify-content-between align-items-center">';
                                            echo '             <form  method="POST">';
                                            echo '             <input type="hidden" value="' . $row['id'] . '" name="product_id" />';
                                            echo '             <input type="hidden" value="' . $row['product_name'] . '" name="product_name" />';
                                            echo '             <input type = "hidden" value="' . $row['product_image'] . '" name="product_image" />';
                                            echo '             <input type = "hidden" value="' . $row['product_price'] . '" name="product_price" />';
                                            echo '             <button type="submit" name="add_to_cart" class="btn my-3 add-to-cart-btn">Add to cart</button>';                                            echo '          </div>';
                                            echo '             </form>';
                                            echo '     </div>';
                                            echo ' </div>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mt-5 p-5 ">
                <div class="cart-section">
                    <div class="cart d-flex flex-column justify-content-evenly">
                        <h1 class="text-center text-light">check out cart</h1>
                        <div class="cart-items" id="cart-items">
                        <form method="POST" action="ordered.php">
    <?php
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $item){
            echo '<div class="card cart-card d-flex justify-content-evenly flex-row align-items-center mb-2">';
            echo '    <div class="cart-img d-flex flex-column m-2 ">';
            echo'          <span >'.$item['product_name'].'</span>';
            echo '        <img src="img/' . $item['product_image'] . '" alt="' . $item['product_name'] . '">';
            echo '    </div>';
            echo '    <div class="cart-quantity d-flex gap-1">';
            echo '        <button type="button" class="btn decrease-btn" onclick="decreaseQuantity(' . $key . ',' . $item['product_price'] . ')">-</button>';
            echo '        <input name="quantity[]" id="quantity_' . $key . '" type="number" min="1" max="20" class="form-control" value="' . $item['quantity'] . '">';
            echo '        <button type="button" class="btn increase-btn" onclick="increaseQuantity(' . $key . ',' . $item['product_price'] . ')">+</button>';
            echo '    </div>';
            echo '    <div class="cart-price">';
            echo '        <span>$' . $item['product_price'] . '</span>';
            echo '    </div>';
            echo '    <div class="cart-close">';
            echo '          <a href="user.php?action=remove&product_id=' . $item['product_id'] . '">';
            echo '            <button type="button" class="btn close-btn bg-danger text-light"> Remove </button>';
            echo '        </a>';
            echo '    </div>';
            echo '</div>';
        }
    } else {
        echo '<p class="text-center text-light">Your cart is empty.</p>';
    }
    ?>
    </div>
    <div class="cart-notes mb-2">
        <div class="form-floating">
            <textarea class="form-control" placeholder="" name="notes" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Notes</label>
        </div>
    </div>
    <div class="cart-room mb-2 text-light">
        <span>Room</span>
        <select name="room_selection" class="m-3">
            <option value="1">Room 1</option>
            <option value="2">Room 2</option>
            <option value="3">Room 3</option>
            <option value="4">Room 4</option>
        </select>
    </div>
    <input type="hidden" id="total-price-input" name="total_price" value="<?php echo $totalPrice; ?>">
    <div class="cart-total-price mb-2 text-light">
        <h3>Total Price: $<span id="total-price" name="total_price"><?php echo $totalPrice; ?></span></h3>
    </div>
    <div class="cart-submit mb-2 text-center">
        <button type="submit" name="submit_order" class="btn w-75">Submit Order</button>
    </div>
</form>


                        
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        let totalPrice = 0;
        <?php
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $item){
                echo 'totalPrice += ' . $item['product_price'] . ' * ' . $item['quantity'] . ';';
            }
        }
        ?>
        document.getElementById('total-price').innerText = totalPrice.toFixed(2);
        document.getElementById('total-price-input').value = totalPrice.toFixed(2);
    });
   function updateTotalPrice(key, price) {
        const quantityInput = document.getElementById('quantity_' + key);
        const totalPriceSpan = document.getElementById('total-price');
        const totalPriceInput = document.getElementById('total-price-input');
        let total = 0;

        <?php
        foreach($_SESSION['cart'] as $key => $item){
            echo 'if (' . $key . ' != key) {';
            echo '    total += ' . $item['product_price'] . ' * document.getElementById("quantity_' . $key . '").value;';
            echo '}';
        }
        ?>

        total += price * quantityInput.value;
        totalPriceSpan.innerText = total.toFixed(2);
        totalPriceInput.value = total.toFixed(2);
    }

    function decreaseQuantity(key, price) {
        const input = document.getElementById('quantity_' + key);
        let value = parseInt(input.value, 10);
        value = isNaN(value) ? 1 : value;
        if (value > 1) {
            value--;
            input.value = value;
            updateTotalPrice(key, price);
        }
    }

    function increaseQuantity(key, price) {
        const input = document.getElementById('quantity_' + key);
        let value = parseInt(input.value, 10);
        value = isNaN(value) ? 1 : value;
        value++;
        input.value = value;
        updateTotalPrice(key, price);
    }
</script>
</body>
</html>
