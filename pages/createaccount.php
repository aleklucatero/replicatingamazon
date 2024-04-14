<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Registration</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <a href="#"><img src="/images/amazon_logo2.png" alt="logo" class="signin-logo"></a>
        <div class="create-account-container">
         <h2>Create account</h2>
            <form class="create-account-form" action="createaccount.php" method="POST">
                <label for="name" class="input-label">Your name</label>
                <input type="text" name="name" placeholder="First and last name" required><br><br>
                <label for="email" class="input-label">Your email</label>
                <input type="text" name="email" placeholder="Email" required><br><br>
                <label for="password" class="input-label">Password</label>
                <input type="text" name="password" placeholder="At least 6 characters" required><br><br>
                <label for="password-confirmation" class="input-label" required>Re-enter</label>
                <input type="text" name="password-confirmation" placeholder="Re-enter" required><br><br>
                <button type="submit">Continue</button>
            </form>
            <hr class="form-divider">
            <a href="/pages/signin.php">
            <button class="create-account-button">Already have an account?</button>
            </a>
     </div>
</body>
</html>