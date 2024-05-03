<link rel="stylesheet" href="css/banner.css">
<link rel="stylesheet" href="css/navbar.css">

    <header>
        <?php include 'navbar.php'; ?>  
        <?php include 'banner.php'; ?>
        <script src="https://kit.fontawesome.com/349ffd27ca.js" crossorigin="anonymous"></script>  
    </header>

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
            <div class="form-group">
                <label for="Address">Address</label>
                <div class="input-group">
                    <input type="text" id="Address" name="Address" placeholder="Enter Address" required>
                    <button type="button" class="edit-btn">Update</button>
                </div>
            </div>
            <div class="form-group">
                <label for="City">City</label>
                <div class="input-group">
                    <input type="text" id="City" name="City" placeholder="Enter City" required>
                    <button type="button" class="edit-btn">Update</button>
                </div>
            </div>
            <div class="form-group">
                <label for="State">State</label>
                <div class="input-group">
                    <input type="text" id="State" name="State" placeholder="Enter State" required>
                    <button type="button" class="edit-btn">Update</button>
                </div>
            </div>
            <div class="form-group">
                <label for="Zip-Code">Zip-Code</label>
                <div class="input-group">
                    <input type="text" id="Zip-Code" name="Zip-Code" placeholder="Enter Zip-code" required>
                    <button type="button" class="edit-btn">Update</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>