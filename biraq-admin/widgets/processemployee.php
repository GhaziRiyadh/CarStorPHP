<?php
if (!empty($_POST)) {
    echo "<pre>got data!\n";
    require_once("db.php");
    // Getting submitted user data from database
    $name = $_POST['fullname'];
    $SSN = $_POST['SSN'];
    $qualification = $_POST['qualification'];
    $username = $_POST['username'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $city = strtoupper($_POST['city']);
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $photo = $_POST['photo'];
    $ssn_photo = $_POST['ssn_photo'];
    //check password and apply hashing
    echo "password check..\n";
    if ($pass1 == $pass2) {
        $pass = password_hash($pass2, PASSWORD_ARGON2I);
        echo "password match!\n";
    }
    //uploading files
    if (!empty($_POST['photo'])) {
        echo "got user photo!\n";
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = microtime(true) . '.' . $temp;
        $fileToMove = $_FILES['photo']['tmp_name'];
        $destinatiom = "./images/ephoto/" . $newfilename;
        $photo = $destinatiom;
        move_uploaded_file($_FILES["file"]["tmp_name"], $destinatiom . $newfilename);
    } else {
        $photo = null;
        echo "no user photo\n";
    }
    if (!empty($_POST['ssn_photo'])) {
        echo "got ssn photo!\n";
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = microtime(true) . '.' . $temp;
        $fileToMove = $_FILES['photo']['tmp_name'];
        $destinatiom = "./images/essn/" . $newfilename;
        $ssn_photo = $destinatiom;
        move_uploaded_file($_FILES["file"]["tmp_name"], $destinatiom . $newfilename);
    } else {
        $ssn_photo = null;
        echo "no ssn photo!\n";
    }
    $query = "SELECT `id` FROM `emp` ORDER BY ID DESC limit 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'] + 1;
    //commit
    echo "submitting..\n";
    if (is_null($photo) == true && is_null($ssn_photo) == false) {
        $query = "INSERT INTO `emp`(`id`, `ssn`, `fullname`, `gender`, `city`, `country`, `photo`, `type`, `qualification`, `ssn_scan`) 
                VALUES ($id, $SSN,\"$name\",\"$gender\",\"$city\",\"$country\",$photo,\"$type\",\"$qualification\",\"$ssn_photo)\"";
    } else if (is_null($photo) == false && is_null($ssn_photo) == true) {
        $query = "INSERT INTO `emp`(`id`, `ssn`, `fullname`, `gender`, `city`, `country`, `photo`, `type`, `qualification`, `ssn_scan`) 
                VALUES ($id, $SSN,\"$name\",\"$gender\",\"$city\",\"$country\",\"$photo\",\"$type\",\"$qualification\",$ssn_photo)";
    } else {
        $query = "INSERT INTO `emp`(`id`, `ssn`, `fullname`, `gender`, `city`, `country`, `photo`, `type`, `qualification`, `ssn_scan`) 
                VALUES ($id, $SSN,\"$name\",\"$gender\",\"$city\",\"$country\",\"$photo\",\"$type\",\"$qualification\",\"$ssn_photo\")";
    }
    if ($conn->query($query) === TRUE) {
        echo "success! on emp table";
        header("location: ../index.php");
    } else {
        echo $conn->error;
        echo "\nfailed! on emp table";
    }
    $query = "INSERT INTO emp_email(ID, email) 
                VALUES ($id, '$email')";
    if ($conn->query($query) === TRUE) {
        echo "success! on emp table";
        header("location: ../index.php");
    } else {
        echo $conn->error;
        echo "\nfailed! on emp table";
    }
    $query = "INSERT INTO emp_info(ID, username, password, email) 
                VALUES ($id, '$username','$pass','$email')";
    if ($conn->query($query) === TRUE) {
        echo "success! on emp table";
        header("location: ../index.php");
    } else {
        echo $conn->error;
        echo "\nfailed! on emp table";
    }
    $query = "INSERT INTO emp_phone(ID, phone) 
                VALUES ($id, '$phone')";
    if ($conn->query($query) === TRUE) {
        echo "success! on emp table";
        header("location: ../index.php");
    } else {
        echo $conn->error;
        echo "\nfailed! on emp table";
    }
    $conn->close();
}
echo "</pre>";
