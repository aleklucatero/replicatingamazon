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

            //Hashing everything for user_id
            // $user_id = hash()
            //Hashing password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            //Set SQL query into variable
            $sql_user = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

            //Execute the query returning boolean
            if (mysqli_query($conn, $sql_user)) {
                //Set up session for newly registered user
                $_SESSION['username'] = $username;

                // Construct the SQL query for getting user_id
                $query = "SELECT user_id FROM users WHERE email = '$email'";

                // Execute the query
                $result = mysqli_query($connection, $query);

                if ($result) {
                    // Check if any rows were returned
                    if (mysqli_num_rows($result) > 0) {
                        // Fetch the result
                        $row = mysqli_fetch_row($result);
                        $user_id = $row[0];
                    } else {
                        //User_id error
                        echo "<script type='text/javascript'>
                        alert('no user_id found');
                        window.location.href = '../createaccount.php';
                        </script>;";
                    }
                } else {
                    echo "Error: " . mysqli_error($connection);
                }
                $_SESSION["id"] = $user_id;
                //if true, will redirect to index.php
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