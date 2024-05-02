<?php
require_once 'connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($product = $result->fetch_assoc()) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="../css/cart.css">
            <link rel="stylesheet" href="../css/product.css">
            <link rel="stylesheet" href="../css/navbar.css">
            <link rel="stylesheet" href="../css/banner.css">
            <link rel="stylesheet" href="../css/footer.css">

            <title><?php echo htmlspecialchars($product['name']); ?></title>
        </head>
        <body>
            <header>
                <?php include '../navbar.php'; ?>
                <?php include '../banner.php'; ?>
                <script src="https://kit.fontawesome.com/349ffd27ca.js" crossorigin="anonymous"></script>
            </header>

            <div class="product-display">
                <div class="product-d-image">
                    <div class="product-main-image">
                        <img src="<?php echo htmlspecialchars($product['image_link']); ?>" width="200" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    </div>
                </div>
                <div class="product-d-details">
                    <p class="product-title"><?php echo htmlspecialchars($product['name']); ?></p>
                    <p class="product-store">Visit the <?php echo htmlspecialchars($product['brand'] ?? 'Generic'); ?> Store</p>
                    <div class="product-rating">
                        <div>
                            <div>4.3 <img src="../images/rating_img.png" height="20px" alt=""></div>
                            <p>40 ratings | Search this page</p>
                        </div>
                        <p><span>#1 Best Seller</span></p>
                        <h5>500+ bought in past month</h5>
                        <hr>
                    </div>
                    <div class="product-prices">
                    <div>
                        <h1>$<span><?php echo number_format(htmlspecialchars($product['price']), 2); ?></span></h1>
                    </div>
                    <p>Get <b>Fast, Free Shipping</b> with <span>Amazon Prime</span></p>
                    <p><span>FREE Returns</span></p>
                    <p>May be available at a lower price from <span>other sellers,</span> potentially without free Prime shipping.</p>
                </div>
                <hr>
                <div class="product-description">
                    <h1>About this item</h1>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                </div>
                </div>
                <div class="product-d-purchase">
                    <div class="title">
                        <h3>Buy new:</h3><img src="../images/circle_icon.png" width="20" alt="">
                    </div>
                    <h1 class="price">$<span><?php echo number_format(htmlspecialchars($product['price']), 2); ?></span></h1>
                    <div class="gap">
                        <p><span>FREE delivery</span> <b>Tomorrow, May 1</b>.</p>
                        <p>Order within 10 hrs 49 mins</p>
                    </div>
                    <div class="pincode-section">
                        <img src="../images/address_marker.png" width="20" alt="">
                        <p><span>Deliver to </span></p>
                    </div>
                    <h2 class="product-stock">In Stock</h2>
                    <select class="product-quantity">
                        <option value="1">Quantity: 1</option>
                        <option value="2">Quantity: 2</option>
                        <option value="3">Quantity: 3</option>
                    </select>
                    <button class="btn">Add to Cart</button>
                    <button class="btn product-buy">Buy Now</button>
                    <div class="product-seller-info">
                        <p>Ships from</p>
                        <p class="product-info-value">Amazon.com</p>
                        <p>Sold by</p>
                        <p class="product-info-value">Amazon.com</p>
                        <p>Returns</p>
                        <p class="product-info-value"><span>Eligible for Return, Refund or Replacement within 15 days of receipt</span></p>
                        <p>Support</p>
                        <p class="product-info-value"><span>Product support included</span></p>
                        <p>Payment</p>
                        <p class="product-info-value"><span>Secure Transaction</span></p>
                    </div>
                    <hr>
                    <button class="product-addtolist">Add to List</button>
                </div>
            </div>

            <footer class="footer-cart">
                <?php include '../footer.php'; ?>
            </footer>
        </body>
        </html>
        <?php
    } else {
        echo "Product not found.";
    }
    $stmt->close();
} else {
    echo "Invalid product ID.";
}
$conn->close();
?>
