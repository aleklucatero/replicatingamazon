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
    <title>Login & Security</title>
    <link rel="stylesheet" href="css/createaccount.css">
</head>
<body>
        <div class="create-account-container">
         <h2>Edit Account</h2>
            <form class="create-account-form" action="crud/adddata.php" method="POST">
                <label for="username" class="input-label">Username</label>
                <input type="text" name="username" placeholder="Enter username" required><br><br>
                <label for="email" class="input-label">Your Email</label>
                <input type="text" name="email" placeholder="Email" required><br><br>
                <label for="password" class="input-label">Password</label>
                <input type="password" name="password" placeholder="At least 6 characters" required><br><br>
                <label for="password-confirmation" class="input-label" required>Re-enter</label>
                <input type="password" name="password-confirmation" placeholder="Re-enter" required><br><br>
                <button type="submit" name="submitaccount">Continue</button>
            </form>
            <hr class="form-divider">
            <a href="signin.php">
            <button class="create-account-button">Already have an account?</button>
            </a>
     </div>
</body>
</html>