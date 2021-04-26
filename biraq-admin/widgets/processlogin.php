<?php
// Always start this first
session_start();
echo "logging in...";
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        require_once("db.php");
        // Getting submitted user data from database
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM emp_info WHERE `username` = \"$username\" OR `email` = \"$username\"";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_array($result);
        
    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['password'], $user['password']) ) {
    		$_SESSION['emp_id'] = $user['username'];
            $conn->close();
            header("location: ../index.php");
    	}   
    }
} else {
    echo "POST is empty!";
    header("location: ../login.html");
}

?>