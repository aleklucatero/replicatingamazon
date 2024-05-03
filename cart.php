<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <header>
        <?php include 'navbar.php'; ?>  
        <?php include 'banner.php'; ?>
        <script src="https://kit.fontawesome.com/349ffd27ca.js" crossorigin="anonymous"></script>  
    </header>

    <main class="shopping-cart main-background-color page-container">
        <?php
        require_once "crud/connect.php";
            // Check if the cart is empty
            $cart_empty = true; // Set to false if there are items in the cart

            if (empty($_SESSION['cart'])) {
                // Display "Shopping Cart is empty"
        ?>
                <div class="textbox_center">
                    <h2>Your Amazon Cart is empty</h2><br>
                    <p class="small_text">Your Shopping Cart lives to serve. Give it purpose — fill it with groceries, clothing, household supplies, electronics, and more.</p>
                    <p class="small_text">Continue shopping on the <a class="small_link" href="index.php">Amazon.com homepage</a>, learn about today's deals, or visit your Wish List.</p>
                </div>
        <?php
            } else {
                // Fetch cart items with product details
            $stmt = $conn->prepare("SELECT cart.cart_id, cart.quantity, products.name, products.image_link, products.description, products.brand, products.price 
            FROM cart 
            INNER JOIN products ON cart.product_id = products.product_id 
            WHERE cart.user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($cart_id, $quantity, $name, $image_link, $description, $brand, $price);
            
            $cart_items = [];
            $total_price = 0;
            
            while ($stmt->fetch()) {
                $cart_items[] = [
                    'cart_id' => $cart_id,
                    'quantity' => $quantity,
                    'name' => $name,
                    'image_link' => $image_link,
                    'description' => $description,
                    'brand' => $brand,
                    'price' => $price
                ];
                $total_price += $price * $quantity;
            }
            
            $stmt->close();
            $conn->close();
            ?>
?>
        ?>
        <div class="cart-left">
            <h1>Shopping Cart</h1>
            <p class="price">Price</p>
            <hr>
            <div class="product-cart-list">
                <!-- Cart items content goes here -->
                <?php
                foreach($cart_items as $item) { ?>
                    <div class="product-cart-item">
                        <img src="https://m.media-amazon.com/images/I/7120GgUKj3L._AC_SL1500_.jpg" width="180px" alt="">
                        <div>
                            <div class="product-cart-titleprice">
                                <p><?php echo $item['description']; ?></p>
                                <p><b><?php echo $item['price']; ?></b></p>
                            </div>
                            <p class="product-cart-bestseller"><span>#1 Best Seller</span></p>
                            <p class="product-cart-stock">In Stock</p>
                            <p class="product-cart-delivery">FREE delivery <b>Sat, May 4</b> available at checkout
                            <p class="product-cart-returns">FREE Returns &#11191</p>
                            <p class="product-cart-giftoption">Gift options not available. 
                            <a class="small_link" href="index.php">Learn more</a></p>
                            <div class="product-cart-specs">
                            </div>
                            <div class="product-cart-list-action">
                                <select>
                                    <option value="Qty: 1">Qty: 1</option>
                                    <option value="Qty: 2">Qty: 2</option>
                                    <option value="Qty: 3">Qty: 3</option>
                                    <option value="Qty: 4">Qty: 4</option>
                                    <option value="Qty: 5">Qty: 5</option>
                                </select>
                                <hr>
                                <p class="action-btn">Delete</p>
                                <hr>
                                <p class="action-btn">Save for later</p>
                                <hr>
                                <p class="action-btn">Compare with similar items</p>
                                <hr>
                                <p class="action-btn">Share</p>
                            </div>
                        </div>
                    </div>
            <?php } ?>
                
            </div>
            <hr>
            <div class="cart-list-subtotal">
                Subtotal (<?php echo count($cart_items); ?> items): <b>$<?php echo number_format($total_price, 2); ?></b>
            </div>
        </div>
        <div class="cart-right">
            <div class="cart-free-delivery">
                <p>&#x2705</p>
                <p>Your order qualifies for FREE Shipping. <br> Choose this option at checkout. <br> See details</p>
            </div>
            <p class="cart-subtotal">Subtotal (<?php echo count($cart_items); ?> items):
                <b>
                    <?php echo number_format($total_price, 2); ?>
                </b>
            </p>
            <p class="cart-right-gift"><input type="checkbox"> This order contains a gift</p>
            <button>Proceed to checkout</button>
        </div>
        <?php
            }
        ?>
    </div>
    </main>
    <footer>
        <?php include 'footer.php'; ?> 
    </footer>
</body>
</html>
