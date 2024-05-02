<?php
require_once "connect.php"; // Make sure this points to your actual connection script

if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $category = $_POST['category'];
    $image_link = $_POST['image_link']; // Get the image URL directly from the form
    $brand = $_POST['brand'];

    // SQL query to insert data into the products table
    $sql = "INSERT INTO products (name, description, price, stock_quantity, category, image_link, brand) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssdisss", $name, $description, $price, $stock_quantity, $category, $image_link, $brand);
        if ($stmt->execute()) {
            $last_inserted_id = $stmt->insert_id; // Get the last inserted ID
            echo "Product added successfully. Redirecting...";
            header("Location: product_detail.php?id=$last_inserted_id"); // Redirect to the detail page
            exit(); // Ensure no further execution
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $conn->close();
}
?>
