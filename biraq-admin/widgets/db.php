<?php
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $db = "biraq";

    $conn = new mysqli($host, $user, $pass, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>