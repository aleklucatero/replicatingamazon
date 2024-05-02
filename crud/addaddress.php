<?php
    session_start();
    require_once "connect.php";
    if (isset($_SESSION["id"])) {
        $user_id = $_SESSION["id"];
    }
    //Checks if form is submitted
    if(isset($_POST['submitaddress'])) {

        //Retrieve form data
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

        //Check if form fields arent empty
        if ($street != "" && $city != "" && $state != "" && $zip != "") {
            
            //Set SQL query into variable
            $sql_address = "INSERT INTO address (street, city, state, zip, user_id) VALUES ('$street', '$city', '$state', '$zip', '$user_id')";

            //Execute query
            if (mysqli_query($conn, $sql_address)) {
                //Store the users city in session
                $_SESSION['user_city'] = $city;
                //if true, will redirect to index.php
                header("location: ../index.php");
                exit();
            } else {
                //Error handling
                echo "Something went wrong. Please try again again.";
            }
        } else {
            //Error handling if inputs are empty
            echo "Address, City, State, and Zip Code cannot be empty";
        }
    }
?>