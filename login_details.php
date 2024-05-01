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
    <link rel="stylesheet" href="css/login_details.css">
</head>
<div class="account-settings">
        <h2>Login & Security</h2>
        <form class="account-form" action="crud/adddata.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-group">
                    <input type="text" id="username" name="username" placeholder="Enter username" required>
                    <button type="button" class="edit-btn">Edit</button>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Enter Email" required>
                    <button type="button" class="edit-btn">Edit</button>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="At least 6 characters" required>
                    <button type="button" class="edit-btn">Edit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>