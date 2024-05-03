<?php
require_once 'connect.php';
session_start();

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>
        alert('User must be logged in to place an order');
        window.location.href = 'index.php';
        </script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addto_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    $user_id = $_SESSION['user_id']; // Retrieve user ID from session

    // Prepare to fetch product details
    $stmt = $conn->prepare("SELECT price, stock_quantity FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Check stock availability
        if ($product['stock_quantity'] >= $quantity) {
            $total_price = $product['price'] * $quantity;

            // Add to cart in database
            $cartStmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
            $cartStmt->bind_param("iii", $user_id, $product_id, $quantity);
            $cartStmt->execute();
            $cart_id = $cartStmt->insert_id;
            $_SESSION['cart'] = $cart_id;

            echo "<script type='text/javascript'>
            alert('Added to cart successfully');
            window.location.href = '../cart.php';
            </script>";
            // Redirect to order details or confirmation page
            header("Location: ../cart.php");
            exit();
        } else {
            echo "<script type='text/javascript'>
            alert('Not enough stock available for quantity');
            window.location.href = '../product_detail.php';
            </script>";
        }
    } else {
        echo "<script type='text/javascript'>
            alert('Product not found');
            window.location.href = '../product_detail.php';
            </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script type='text/javascript'>s
    alert('Invalid request');
    window.location.href = '../index.php';
    </script>";
}
?>
