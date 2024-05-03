<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Security</title>
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/login_details.css">
</head>
<body>
    <header>
        <?php include 'navbar.php'; ?>  
        <?php include 'banner.php'; ?>
        <script src="https://kit.fontawesome.com/349ffd27ca.js" crossorigin="anonymous"></script>  
    </header>

    <?php
    require_once "crud/connect.php"; // Include your database connection file

    $user_id = $_SESSION['id'];

    // Query to get current user details
    $query = "SELECT username, email FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch the result
        $row = mysqli_fetch_assoc($result);
        $current_username = $row['username'];
        $current_email = $row['email'];
    } else {
        // Handle database error
        echo "Error: " . mysqli_error($conn);
        exit();
    }
    ?>

    <div class="account-settings">
        <h2>Login & Security</h2>
        <form class="account-form" action="crud/adddata.php" method="POST">
            <!-- Hidden input field for user ID -->
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter username" value="<?php echo $current_username; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Email" value="<?php echo $current_email; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="At least 6 characters" required>
            </div>
            
            <!-- Single submit button for the entire form -->
            <button type="submit" class="edit-btn" name="updateaccount">Update</button>
        </form>

        <form class="delete-form" action="crud/delete_account.php" method="POST">
        <!-- Hidden input field for user ID -->
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
        <button type="submit" class="delete-btn" name="deleteaccount">Delete Account</button>
    </form>
    </div>
</body>
</html>
