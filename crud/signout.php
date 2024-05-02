<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // Redirect to your desired page after sign-out
exit;
?>
