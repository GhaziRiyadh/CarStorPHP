<?php
if (!empty($_POST)) {
    print_r($_POST);
    require_once("db.php");
    // Getting submitted user data from database
    $vin = $_POST['vin'];
    $brand = $_POST['brand'];
    $color = $_POST['color'];
    $year = $_POST['year'];
    $style = $_POST['style'];
    $model = $_POST['model'];
    $gear = $_POST['gear'];
    $gear_type = $_POST['gear_type'];
    $cylinder = $_POST['cylinder'];
    $cost = $_POST['cost'];
    $price = $_POST['price'];
    $drive_type = $_POST['drive_type'];
    $fuel_type = $_POST['fuel_type'];
    $seats_num = $_POST['seats_num'];
    $p_id = $_POST['P_id'];
    $now = date("Y-m-d H:i:s");

    $query = "INSERT INTO `car`(`vin`, `brand`, `color`, `year`, `style`, `model`, `gear`, `gear_type`, `cylinder`, `cost`, `price`, `drive_type`, `fuel_type`, `seats_num`, `p_id`, `date`) 
        VALUES ($vin,$brand,$color,$year,$style,$model,$gear,$gear_type,$cylinder,$cost,$price,$drive_type,$fuel_type,$seats_num,$p_id,$now)";
    if ($conn->query($query) === TRUE) {
        print_r($_FILES);
        $total = count($_FILES['car_photos']['name']);
        for ($i = 0; $i < $total; $i++) {
            $newfilename = microtime(true) . '.' . $_FILES["car_photos"]["name"][$i];
            $fileToMove = $_FILES['photo']['tmp_name'][$i];
            if ($fileToMove != "") {
                $newFilePath = "../carImages/" . $newfilename . $_FILES['car_photos']['name'][$i];
                if (move_uploaded_file($fileToMove, $newFilePath)) {
                    $image = "./carImages/" . $newfilename . $_FILES['car_photos']['name'][$i];
                    $query = "INSERT INTO `car_photos`(`vin`, `photo`) VALUES ('$vin','$image')";
                }
            }
        }
        //header("location: ../index.php");
    }


    $conn->close();
} else {
    echo "POST is empty!";
    echo " failed!";
}
