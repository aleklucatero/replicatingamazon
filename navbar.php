<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/banner.css">

<?php
    //Starting the session
    session_start();

    //Checking if the user is logged in
    $username = $_SESSION['username'];
    $logged_in = isset($username);
?>


<nav class="navbar">
    <div class="nav-logo">
        <a href="index.php"><img src="images/amazon_logo.png" alt="Amazon Logo"></li></a>
    </div>
    <div class="address">
        <a href="#" class="deliver">Delivering to</a>
        <div class="map-icon">
            <i class="fas fa-map-marker-alt"></i>
            <a href="#" class="location"><?php echo isset($_SESSION['user_city']) ? $_SESSION['user_city'] : "Default City"; ?></a>
        </div>
    </div>
    <div class="nav-search">
        <select class="select-search">
            <option>All</option>
            <option>All Categories</option>
            <option>Amazon Devices</option>
        </select>
        <input type="text" placeholder="Search Amazon" class="search-input">
        <div class="search-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
    </div>
    <?php if ($logged_in) { ?>
    <div class="sign-in">
        <a href="account_details.php">
            <p>Hello, <?php echo $_SESSION['username']; ?></p>
            <span>Account & Lists</span>
        </a>
    </div>
    <div class="returns">
        <a href="orders.php">
            <p>Returns</p>
            <span>& Orders</span>
        </a>
    </div>
    <?php } else { ?>
        <div class="sign-in">
        <a href="signin.php">
            <p>Hello, sign in</p>
            <span>Account & Lists</span>
        </a>
    </div>
    <div class="returns">
        <a href="signin.php">
            <p>Returns</p>
            <span>& Orders</span>
        </a>
    </div>
    <?php } ?>
    <div class="cart">
            <a href="cart.php">
            <span class="material-symbols-outlined cart-icon"></span>
            <i class="fa-solid fa-cart-shopping"></i>
            <p>Cart</p>
        </a>
    </div>
</nav>
