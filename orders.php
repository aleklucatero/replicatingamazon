<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link rel="stylesheet" href="css/orders.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <header>
        <?php include 'navbar.php'; ?>  
        <?php include 'banner.php'; ?>
    </header>
    
    <div class="orders-container">
        <p class="breadcrumb">
            Your Account > Your Orders
        </p>
        <div class="order-filters">
            <h1>Your Orders</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search all orders">
                <button>Search Orders</button>
            </div>
        </div>
        
        <div class="tab-menu">
            <button class="tab-link active">Orders</button>
            <button class="tab-link">Cancelled Orders</button>
            <!-- More tabs here -->
        </div>

        <?php
            // Check if there are orders available
            $orders_available = false; // Set to true if there are orders available, otherwise false
            if ($orders_available) {
                // Display orders
        ?>
        <div class="order-item">
            <div class="order-header">
                <span>ORDER PLACED <br> March 26, 2024</span>
                <span>TOTAL <br> $1,351.86</span>
                <span>SHIP TO <br> Account Name</span>
                <span>ORDER # 111-1493458-0654656</span>
            </div>
            <div class="order-status">
                    <strong>Delivered Mar 27, 2024</strong><br>
                    Your package was left near the front door or porch.
                </div>
            <div class="order-body">
                <div class="order-content">
                    <img src="images/macbook.jpg" alt="">
                    <div>
                        <p>Apple 2024 MacBook Air 15-inch Laptop with M3 chip: 15.3-inch Liquid Retina Display,
                             8GB Unified Memory, 256GB SSD Storage, Backlit Keyboard, 1080p FaceTime HD Camera, Touch ID; Silver</p>
                        <p>Return window closed on Apr 26, 2024</p>
                        <button>Buy it again</button>
                        <button>View your item</button>
                    </div>
                </div>
                <div class="order-actions">
                    <button>Track package</button>
                    <button>Cancel Order</button>
                </div>
            </div>
            <div class="order-footer">
                <button>Archive order</button>
            </div>
        </div>
        <?php
            } else {
                // Display "No orders placed" message
        ?>
        <div class="order-item">
            <div class="order-header">
                <span>No orders placed</span>
            </div>
        </div>
        <?php
            }
        ?>
    </div>

    <footer class="footer-orders">
        <?php include 'footer.php'; ?> 
    </footer>

    <script src="https://kit.fontawesome.com/349ffd27ca.js" crossorigin="anonymous"></script>  
</body>
</html>
