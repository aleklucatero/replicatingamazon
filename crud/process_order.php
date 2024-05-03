<?php
session_start();
require_once 'connect.php';
// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    echo "You must be logged in to place an order.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy_now'])) {
    $product_id = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    $user_id = $_SESSION["id"]; // Retrieve user ID from session

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

            // Insert the order
            $orderStmt = $conn->prepare("INSERT INTO orders (user_id, total_amount, status) VALUES (?, ?, 'pending')");
            $orderStmt->bind_param("id", $user_id, $total_price);
            $orderStmt->execute();
            $order_id = $orderStmt->insert_id;

            // Insert order details
            // $detailStmt = $conn->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
            // $detailStmt->bind_param("iiid", $order_id, $product_id, $quantity, $product['price']);
            // $detailStmt->execute();

            // Update stock
            $newStock = $product['stock_quantity'] - $quantity;
            $updateStockStmt = $conn->prepare("UPDATE products SET stock_quantity = ? WHERE product_id = ?");
            $updateStockStmt->bind_param("ii", $newStock, $product_id);
            $updateStockStmt->execute();

            echo "Order processed successfully.";
            // Redirect to order details or confirmation page
            header("Location: ../orders.php");
            exit();
        } else {
            echo "Not enough stock available.";
        }
    } else {
        echo "Product not found.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
