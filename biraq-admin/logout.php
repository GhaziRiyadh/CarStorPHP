<?php
    session_start();
    if(!isset($_SESSION['emp_id'])) {
        echo "logging out...";
        session_destroy();
    }
    header("location: ./login.html");
?>