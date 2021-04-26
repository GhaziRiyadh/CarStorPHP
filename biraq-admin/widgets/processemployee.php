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
    $city = $_POST['city'];
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
        $fileToMove = $_FILES['photo']['tmp_name'];
        $destinatiom = "./ephoto/";
        $photo = $destinatiom;
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["file"]["tmp_name"], $destinatiom . $newfilename);
    } else {
        echo "no user photo\n";
    }
    if (!empty($_POST['ssn_photo'])) {
        echo "got ssn photo!\n";
        $fileToMove = $_FILES['ssn_photo']['tmp_name'];
        $destinatiom = "./essn/";
        $ssn_photo = $destinatiom;
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["file"]["tmp_name"], $destinatiom . $newfilename);
    } else {
        echo "no ssn photo!\n";
    }
    //commit
    echo "submitting..\n";
    $query = "BEGIN;
            INSERT INTO `emp`(`ssn`, `fullname`, `gender`, `city`, `country`, `photo`, `type`, `qualification`,`ssn_scan`) 
                VALUES ($SSN,$name,$gender,$city,$country,$photo,$type,$qualification,$ssn_photo);
            INSERT INTO `emp_email`(`ID`, `email`) 
                VALUES (LAST_INSERTED_ID(),$email);
            INSERT INTO `emp_info`(`ID`, `username`, `password`, `email`) 
                VALUES (LAST_INSERTED_ID(),$username,$pass,$email);
            INSERT INTO `emp_phone`(`ID`, `phone`) 
                VALUES (LAST_INSERTED_ID(),$phone);
            COMMIT;";
    if ($conn->query($query) === TRUE) {
        $conn->close();
        echo "success!";
        header("location: ../index.php");
    } else {
        echo $conn->error;
        echo "failed!";
    }
    $conn->close();
}
echo "</pre>";
