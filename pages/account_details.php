 <!-- THIS PAGE WILL CONTAIN ACCOUNT INFO. THEN LINKS TO EITHER UPDATE ADDRESS, 
CHANGE PASSWORD, AND DELETE ACCOUNT -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account</title>
    <link rel="stylesheet" href="../css/navbar.css">  
    <link rel="stylesheet" href="../css/banner.css">  
    <link rel="stylesheet" href="../css/account_details.css">  
    <script src="https://kit.fontawesome.com/349ffd27ca.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php include '../includes/navbar.php'; ?>  
        <?php include '../includes/banner.php'; ?>  
    </header>  

    <!-- Start of the account-boxes container -->
        <div class="account-boxes">
        <a href="#" target="_blank" class="box">
            <img src="../images/orders.png" alt="Orders Icon">
            <div class="box-content">
                <h3>Your Orders</h3>
                <p>Track, return, cancel an order, download invoice or buy again</p>
            </div>
        </a>

        <a href="#" target="_blank" class="box">
            <img src="../images/security.png" alt="Security Icon">
            <div class="box-content">
                <h3>Login & security</h3>
                <p>Edit login, name, and mobile number</p>
            </div>
        </a>

        <a href="#" target="_blank" class="box">
            <img src="../images/address.png" alt="Address Icon">
            <div class="box-content">
                <h3>Your Addresses</h3>
                <p>Edit, remove or set default address</p>
            </div>
        </a>

        <a href="#" target="_blank" class="box">
            <img src="../images/payment.png" alt="Payment Icon">
            <div class="box-content">
                <h3>Your Payments</h3>
                <p>View all transactions, manage payment methods and settings</p>
            </div>
        </a>

        <a href="#" target="_blank" class="box">
            <img src="../images/inbox.jpg" alt="Inbox Icon">
            <div class="box-content">
                <h3>Your Messages</h3>
                <p>View or respond to messages from Amazon, Sellers and Buyers</p>
            </div>
        </a>

        <a href="#" target="_blank" class="box">
            <img src="../images/manage.png" alt="Manage Icon">
            <div class="box-content">
                <h3>Manage your data</h3>
                <p>Close Your Amazon Account</p>
            </div>
        </a>
    </div> <!-- End of the account-boxes container -->

    <!-- <footer>
        <?php include '../includes/footer.php'; ?> 
    </footer> -->
</body>
</html>