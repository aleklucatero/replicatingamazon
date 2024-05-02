<?php
    session_start();
    //check if user already logged in
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        // echo "before if loggedin, redirect";
        header("location: ../index.php");
        // exit;
    }
    require_once "connect.php";

    //Declaring variables to put POST submissions in
    $input_email = $input_password = "";
    $email_err = $password_err = $login_err = "";
    // echo "Declared some vars";
    //Checks if form is submitted
    if(isset($_POST["login"])) {
        // echo "pass post method check";
        //Retrieving form data, checking if empty
        
        if(empty(filter_input(INPUT_POST, "email",
        FILTER_SANITIZE_EMAIL))) {
            $email_err = "Please enter an email";
            // echo "email empty";
        }
        else {
            $input_email = filter_input(INPUT_POST, "email",
                                    FILTER_SANITIZE_EMAIL);
        }
        // echo "pass email check";
        //Check if password empty
        if(empty(filter_input(INPUT_POST, "password",
        FILTER_SANITIZE_ENCODED))) {
            $password_err = "Please enter a password";
        } else{
            $input_password = filter_input(INPUT_POST, "password",
                                        FILTER_SANITIZE_ENCODED);
        }
        // echo "pass password check";
        //Check if form fields arent empty
        if(empty($email_err && $password_err)) {
            //Preparing SQL query statement
            $sql_query = "SELECT user_id, username, password FROM users WHERE email = ?";
            // echo "prepare the right query stmt";
            //Execute the query returning boolean
            if($valid_query = $conn->prepare($sql_query)) {
                // echo "bind sucessful";
                //bind parameters for execution
                $valid_query->bind_param("s",$param_email);
                $param_email = $input_email;
                //Execute the prepare SQL statement
                if($valid_query->execute()) {
                    //Store the result if successful
                    $valid_query->store_result();
                    //Check if email matches
                    if($valid_query->num_rows == 1) {
                        //Bind result
                        $valid_query->bind_result($id, $username, $hashed_pass);
                        // echo "bind result done";
                        //Grab the binded variables
                        if($valid_query->fetch()) {
                            // echo "fetch successful";
                            if(password_verify($input_password,$hashed_pass)) {
                                // echo "good login";
                                //successful login
                                session_start();
                                //Store data in session global vars
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;
                                //Redirects user to main page
                                header("location:../index.php");
                                exit; // Make sure to exit after header redirection
                            } else {
                                //Bad password, don't login, display error
                                $password_err = "Invalid password";
                                echo "<script type='text/javascript'>
                                alert('$password_err');
                                window.location.href = '../signin.php';
                                </script>;";
                                
                            }
                        } else {
                            $login_err = "Oh no, something went wrong, try again later.";
                            echo "<script type='text/javascript'>
                            alert('$login_err');
                            window.location.href = '../signin.php';
                            </script>;";
                        }
                    } else {
                        //Bad email, does not match database
                        echo "bad login";
                        $email_err = "Email does not match our records";
                        echo "<script type='text/javascript'>
                        alert('$email_err');
                        window.location.href = '../signin.php';
                        </script>;";
                        
                    }
                    $valid_query->close();
                }
            } else {
                //Error handling
                $login_err = "Bad query validation, try again.";
                echo "<script type='text/javascript'>
                alert('$login_err');
                window.location.href = '../signin.php';
                </script>;";
            }
            $conn->close();
        } else {
            //Error handling if inputs are empty
            $login_err = "Username, Email, and Password cannot be empty";
            echo "<script type='text/javascript'>
            alert('$login_err');
            window.location.href = '../signin.php';
            </script>;";
        }
    }
    exit;
?>
