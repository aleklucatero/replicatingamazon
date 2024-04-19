<link rel="stylesheet" href="css/createaccount.css">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Registration</title>
    <link rel="stylesheet" href="/css/createaccount.css">
</head>
<body>
    <a href="../index.php"><img src="/images/amazon_logo2.png" alt="logo" class="signin-logo"></a>
        <div class="create-account-container">
         <h2>Create account</h2>
            <form class="create-account-form" action="../crud/adddata.php" method="POST">
                <label for="username" class="input-label">Username</label>
                <input type="text" name="username" placeholder="Enter username" required><br><br>
                <label for="email" class="input-label">Your Email</label>
                <input type="text" name="email" placeholder="Email" required><br><br>
                <label for="password" class="input-label">Password</label>
                <input type="password" name="password" placeholder="At least 6 characters" required><br><br>
                <label for="password-confirmation" class="input-label" required>Re-enter</label>
                <input type="password" name="password-confirmation" placeholder="Re-enter" required><br><br>
                <button type="submit">Continue</button>
            </form>
            <hr class="form-divider">
            <a href="/pages/signin.php">
            <button class="create-account-button">Already have an account?</button>
            </a>
     </div>
</body>
</html>