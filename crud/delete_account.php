<?php
require_once "connect.php";
session_start();

if(isset($_POST['deleteaccount'])) {
    $user_id = $_POST['user_id'];

    // Delete user's address records first
    $delete_address_query = "DELETE FROM address WHERE user_id = ?";
    $stmt_address = mysqli_prepare($conn, $delete_address_query);
    mysqli_stmt_bind_param($stmt_address, "i", $user_id);
    
    // Execute the address delete query
    if (!mysqli_stmt_execute($stmt_address)) {
        // Error executing address delete query
        echo "Error deleting address records: " . mysqli_error($conn);
        exit();
    }

    // Delete the user from the users table
    $delete_user_query = "DELETE FROM users WHERE user_id = ?";
    $stmt_user = mysqli_prepare($conn, $delete_user_query);
    mysqli_stmt_bind_param($stmt_user, "i", $user_id);
    
    // Execute the user delete query
    if (mysqli_stmt_execute($stmt_user)) {
        // Check if any rows were affected
        if (mysqli_stmt_affected_rows($stmt_user) > 0) {
            // User deleted successfully, redirect to index.php
            session_destroy(); // Destroy session data
            header("Location: ../index.php");
            exit();
        } else {
            // No rows affected, user not found
            echo "<script>alert('User not found'); window.location.href = '../login_details.php';</script>";
            exit();
        }
    } else {
        // Error executing user delete query
        echo "Error deleting user: " . mysqli_error($conn);
        exit();
    }
} else {
    // No delete request received
    echo "No delete request received";
    exit();
}
?>
