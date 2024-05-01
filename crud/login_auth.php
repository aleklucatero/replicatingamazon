<?php
    require_once "connect.php";
    session_start();

    //Checks if form is submitted
    if(isset($_POST['login'])) {

        //Retrieving form data
        $input_email = filter_input(INPUT_POST, "email",
                                    FILTER_SANITIZE_EMAIL);
        $input_password = filter_input(INPUT_POST, "password",
                                        FILTER_SANITIZE_ENCODED)

        //Check if form fields arent empty
        if($username != "" && $password != "") {

            //Hashing provided password for upcoming comp
            $hashed_input_password = password_hash($input_password, PASSWORD_DEFAULT);

            //Retrieving data from database query
            $sql_query = "SELECT password * FROM users WHERE ";
            $hashed_password = 

            //Execute the query returning boolean
            if (mysqli_query($conn, $sql_user)) {
                //Set up session for newly registered user
                $_SESSION['username'] = $username;
                //if true, will redirect to add_address.php to link address to user
                header("location: ../add_address.php");
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