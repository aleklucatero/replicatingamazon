<?php
    require_once "connect.php";
    session_start();

    //Checks if form is submitted
    if(isset($_POST['submitaccount'])) {

        //Retrieving form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Check if form fields arent empty
        if($username != "" && $email != "" && $password != "") {

            //Hashing password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            //Set SQL query into variable
            $sql_user = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

            //Execute the query returning boolean
            if (mysqli_query($conn, $sql_user)) {
                //Set up session for newly registered user
                $_SESSION['username'] = $username;
                //if true, will redirect to index.php
                header("location: ../pages/address.php");
                exit();
            } else {
                //Error handling
                echo "Something went wrong. Please try again again.";
            }
        } else {
            //Error handling if inputs are empty
            echo "Username, Email, and Password cannot be empty";
        }
    }
?>