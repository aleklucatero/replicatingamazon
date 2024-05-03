<link rel="stylesheet" href="css/banner.css">
<link rel="stylesheet" href="css/navbar.css">

    <header>
        <?php include 'navbar.php'; ?>  
        <?php include 'banner.php'; ?>
        <script src="https://kit.fontawesome.com/349ffd27ca.js" crossorigin="anonymous"></script>  
    </header>

    <?php
    require_once "crud/connect.php"; // Include your database connection file

    $user_id = $_SESSION['id'];

    // Query to get current user details
    $query = "SELECT street, city, state, zip FROM address WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch the result
        $row = mysqli_fetch_assoc($result);
        $current_street = $row['street'];
        $current_city = $row['city'];
        $current_state = $row['state'];
        $current_zip = $row['zip'];
    } else {
        // Handle database error
        echo "Error: " . mysqli_error($conn);
        exit();
    }
    ?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Addresses</title>
    <link rel="stylesheet" href="css/login_details.css">
</head>
<div class="account-settings">
        <h2>Your Addresses</h2>

        <form class="account-form" action="crud/adddata.php" method="POST">
        <!-- Hidden input field for user ID -->
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
            
            <div class="form-group">
                <label for="Address">Address</label>
                <div class="input-group">
                <input type="text" id="street" name="street" placeholder="Enter Address" value="<?php echo $current_street; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="City">City</label>
                <div class="input-group">
                    <input type="text" id="city" name="city" placeholder="Enter City" value="<?php echo $current_city; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="State">State</label>
                <div class="input-group">
                    <input type="text" id="state" name="state" placeholder="Enter State" value="<?php echo $current_state; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="Zip-Code">Zip-Code</label>
                <div class="input-group">
                    <input type="text" id="zip" name="zip" placeholder="Enter Zip-code" value="<?php echo $current_zip; ?>" required>
                </div>
            </div>
            <!-- Single submit button for the entire form -->
            <button type="submit" class="edit-btn" name="updateaddress">Update</button>
        </form>
    </div>
</body>
</html>