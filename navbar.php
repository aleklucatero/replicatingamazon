<?php
session_start();

// Check if the user is logged in
$logged_in = isset($_SESSION['username']);

// Check if the sign-out button is clicked
if (!isset($_SESSION['user_city']) && $logged_in) {
    // Query the user's city from the database based on their user ID and set the session variable
    require_once "crud/connect.php"; // Include your database connection file
    $user_id = $_SESSION['id'];
    $query = "SELECT city FROM address WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_city'] = $row['city'];
    } else {
        // Handle database error
        $_SESSION['user_city'] = "Default City";
    }
}

// Check if the sign-out button is clicked
if(isset($_POST["logout"])) {
    echo '<script>
            var confirmLogout = confirm("Are you sure you want to log out?");
            if (confirmLogout) {
                window.location.href = "crud/signout.php";
            }
          </script>';
}
?>

<nav class="navbar">
    <div class="nav-logo">
        <a href="index.php"><img src="images/amazon_logo.png" alt="Amazon Logo"></a>
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
            <!-- Add form for signing out -->
            <form method="post" action="">
                <button class="dropbtn" type="submit" name="logout">Sign out</button>
            </form>
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
