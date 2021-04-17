<?php
// Initialize the session
session_start();

// Unset all of the session variables
setcookie("Email", $email, time() - 8640000);
setcookie("password", $password, time() - 8640000);
setcookie(
    "profile",
    $_GET['profile'],
    time() - 8640000
);


// Redirect to login page
header("location: index.php");
exit;
