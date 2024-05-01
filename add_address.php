

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Address</title>
    <link rel="stylesheet" href="css/createaccount.css">
</head>
<body>
    <a href="index.php"><img src="images/amazon_logo2.png" alt="logo" class="signin-logo"></a>
        <div class="create-account-container">
         <h2>Add New Address</h2>
            <form class="create-account-form" action="crud/addaddress.php" method="POST">
                <label for="street" class="input-label">Address</label>
                <input type="text" name="street" placeholder="Street Address" required><br><br>
                <label for="city" class="input-label">City</label>
                <input type="text" name="city" required><br><br>
                <label for="state" class="input-label">State</label>
                <input type="text" name="state" required><br><br>
                <label for="zip" class="input-label">Zip-Code</label>
                <input type="text" name="zip" required><br><br>
                <button type="submit" name="submitaddress">Continue</button>
            </form>
     </div>
</body>
</html>