<?php

// Include config file
require_once 'app.php';

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loginANDlogup"]) && $_SESSION["loginANDlogup"] === true and $_SERVER["REQUEST_METHOD"] == "GET") {
    header("location: " . $_POST['path_page']);
    exit;
}

// Define variables and initialize with empty values
$email = $password_login = "";
$email_err_login = $password_login_err_login = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Check if email is empty
    if (empty(trim($_GET["email"]))) {
        $email_err_login = "من فضلك ادخل البريد الاكتروني";
    } else {
        $email = trim($_GET["email"]);
    }

    // Check if password_login is empty
    if (empty(trim($_GET["password_login"]))) {
        $password_login_err_login = "من فضلك ادخل كلمة المرور";
    } else {
        $password_login = trim($_GET["password_login"]);
    }

    // Validate credentials
    if (empty($email_err_login) && empty($password_login_err_login)) {
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM users WHERE email = :email";

        if ($stmt = $pdo->prepare($sql)) {

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Check if email exists, if yes then verify password_login
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $email = $row["email"];
                        $hashed_password_login = $row["password_login"];
                        if (password_verify($password_login, $hashed_password_login)) {
                            // password_login is correct, so start a new session
                            session_start();

                            setcookie(
                                "email",
                                $email,
                                time() + 864000
                            );
                            setcookie(
                                "password",
                                $password,
                                time() + 864000
                            );


                            // Store data in session variables
                            $_SESSION["loginANDlogup"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $emailAfter = $email;
                            $password_loginAfter = $password_login;
                            $sqlafter = "SELECT profile FROM users WHERE email = :email";
                            $profileAfter = $pdo->prepare($sqlafter);
                            $profileAfter->bindParam(":email", $email, PDO::PARAM_STR);
                            $profileAfter->execute();
                            // Redirect user to welcome page
                            header("location: " . $_POST['path_page']);
                        } else {
                            // password_login is not valid, display a generic error message
                            $login_err = "خطأ في كلمة المرور او البريد الاكتروني!!";
                        }
                    }
                } else {
                    // email doesn't exist, display a generic error message
                    $login_err = "Invalid email or password_login.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    // Close connection
    unset($pdo);
}
