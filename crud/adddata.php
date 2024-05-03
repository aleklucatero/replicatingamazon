<?php
require_once "connect.php";
session_start();

// Check if form is submitted for account creation
if(isset($_POST['submitaccount'])) {
    // Retrieving form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if form fields aren't empty
    if($username != "" && $email != "" && $password != "") {
        // Construct the SQL query for checking duplicate email
        $e_query = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $e_query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Duplicate email
                echo "<script type='text/javascript'>
                alert('An account with this email already exists');
                window.location.href = '../createaccount.php';
                </script>";
                exit();
            }
        } else {
            echo "Error: " . mysqli_error($conn);
            exit();
        }

        // Hashing password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Set SQL query for inserting new user
        $sql_user = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql_user);
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
        
        // Execute the query for inserting new user
        if (mysqli_stmt_execute($stmt)) {
            // Set up session for newly registered user
            $_SESSION['username'] = $username;

            // Get the user_id of the newly created user
            $user_id = mysqli_insert_id($conn);
            $_SESSION["id"] = $user_id;
            
            // Redirect to adding address
            header("location: ../add_address.php");
            exit();
        } else {
            // Error handling
            echo "Something went wrong. Please try again.";
            exit();
        }
    } else {
        // Error handling if inputs are empty
        echo "Username, Email, and Password cannot be empty";
        exit();
    }
}

// Check if form is submitted for updating account
if(isset($_POST['updateaccount'])) {
    // Retrieving form data
    $user_id = $_SESSION['id']; // Assuming you have stored user_id in session
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if form fields aren't empty
    if($user_id != "" && ($username != "" || $email != "" || $password != "")) {
        $update_query = "UPDATE users SET";

        // Add fields to update if provided
        $params = array();
        $types = "";
        if ($username != "") {
            $update_query .= " username = ?,";
            $params[] = $username;
            $types .= "s";
        }
        if ($email != "") {
            $update_query .= " email = ?,";
            $params[] = $email;
            $types .= "s";
        }
        if ($password != "") {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $update_query .= " password = ?,";
            $params[] = $hashed_password;
            $types .= "s";
        }

        // Remove trailing comma
        $update_query = rtrim($update_query, ',');

        // Add condition for specific user
        $update_query .= " WHERE user_id = ?";
        $params[] = $user_id;
        $types .= "i";

        // Prepare and execute the update query
        $stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($stmt, $types, ...$params);

        if (mysqli_stmt_execute($stmt)) {
            // Update the session variable with the new username
            $_SESSION['username'] = $username;

            echo "<script type='text/javascript'>
            alert('Account updated successfully');
            window.location.href = '../index.php';
            </script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    } else {
        // Error handling if inputs are empty
        echo "Username, Email, and Password cannot be empty";
        exit();
    }
}


// Check if form is submitted for updating address
if(isset($_POST['updateaddress'])) {
    // Retrieving form data
    $user_id = $_SESSION['id']; // Assuming you have stored user_id in session
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    // Check if form fields aren't empty
    if($user_id != "" && ($street != "" || $city != "" || $state != "" || $zip != "")) {
        $update_query_address = "UPDATE address SET";

        // Add fields to update if provided
        $params = array();
        $types = "";
        if ($street != "") {
            $update_query_address .= " street = ?,";
            $params[] = $street;
            $types .= "s";
        }
        if ($city != "") {
            $update_query_address .= " city = ?,";
            $params[] = $city;
            $types .= "s";
        }
        if ($state != "") {
            $update_query_address .= " state = ?,";
            $params[] = $state;
            $types .= "s";
        }
        if ($zip != "") {
            $update_query_address .= " zip = ?,";
            $params[] = $zip;
            $types .= "s";
        }

        // Remove trailing comma
        $update_query_address = rtrim($update_query_address, ',');

        // Add condition for specific user
        $update_query_address .= " WHERE user_id = ?";
        $params[] = $user_id;
        $types .= "i";

        // Prepare and execute the update query
        $stmt = mysqli_prepare($conn, $update_query_address);
        mysqli_stmt_bind_param($stmt, $types, ...$params);

        if (mysqli_stmt_execute($stmt)) {
            // Update the session variable with the new username
            $_SESSION['user_city'] = $city;

            echo "<script type='text/javascript'>
            alert('Address updated successfully');
            window.location.href = '../index.php';
            </script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    } else {
        // Error handling if inputs are empty
        echo "Address, City, State, and Zip-Code cannot be empty";
        exit();
    }
}