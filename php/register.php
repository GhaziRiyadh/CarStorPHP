<?php
// Include config file
require_once 'app.php';

$datacontrol = new mysqli_connection;
$datacontrol = $datacontrol->connect();

// Define variables and initialize with empty values
$Email = $profile = $fullName  = $phoneNumber_logup = $password = $confirm_password = "";
$Email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Validate Email
    if (empty(trim($_GET['Email']))) {
        $Email_err = "من فضلك ادخل البريد الالكتروني.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE Email = ?";

        if ($stmt = $datacontrol->prepare($sql)) {
            // Set parameters
            $param_Email = trim($_GET["Email"]);

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_Email);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                if ($stmt->num_rows() == 1) {
                    $Email_err = "تم تسخيل الدخول بهذا الحساب من قبل.";
                } else {
                    $Email = trim($_GET["Email"]);
                }
            } else {
                echo "همم! حدث خطأ ما.";
            }

            // Close statement
            unset($stmt);
        }
    }

    // Validate password
    if (empty(trim($_GET["Password_logup"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_GET["Password_logup"])) < 6) {
        $password_err = "يجب ان تحتوي كلمة المرور على 6 حروف فقط.";
    } else {
        $password = trim($_GET["Password_logup"]);
    }

    // Validate confirm password
    if (empty(trim($_GET["confirm_password"]))) {
        $confirm_password_err = "لوسمحت اكد كلمة المرور.";
    } else {
        $confirm_password = trim($_GET["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "كلمة المرور ليست متطابقة.";
            header("location: " . $_POST['path_page']);
        }
    }

    // Check input errors before inserting in database
    if (empty($Email_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO clint( name ,profile) VALUES (? ,?)";
        $sql_phonnumber = "INSERT INTO phonenumber(phoneNumber) VALUES (?)";
        $sql_Email_pass = "INSERT INTO Email( Email ,password) VALUES (? ,?)";

        if ($stmt = $datacontrol->prepare($sql) and $Email_insert = $datacontrol->prepare($sql_Email_pass) and $phoneNumber_insert = $datacontrol->prepare($sql_phonnumber)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $_GET['profile'], $_GET['fullName']);
            $Email_insert->bind_param("ss", $param_Email, $param_password);
            $phoneNumber_insert->bind_param("s", $_GET['phoneNumber_logup']);


            // Set parameters
            $param_Email = $Email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if ($stmt->execute() and $Email_insert->execute() and $phoneNumber_insert->execute()) {
                setcookie("Email", $Email, time() + 864000);
                setcookie("password", $password, time() + 864000);
                setcookie(
                    "profile",
                    $_GET['profile'],
                    time() + 864000
                );
                // Redirect to login page
                header("location: " . $_POST['path_page']);
            } else {
                echo "همم! حدث حطأ ما حاول مره اخرى!!";
            }

            // Close statement
            unset($stmt);
            unset($Email_insert);
            unset($phoneNumber_insert);
        }
    }

    // Close connection
    unset($pdo);
}
