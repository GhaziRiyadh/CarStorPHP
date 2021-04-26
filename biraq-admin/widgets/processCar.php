<?php
if ( ! empty( $_POST ) ) {
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
    if ($conn->query($query) === TRUE){
        header("location: ../index.php");
    }
    $conn->close();  
} else {
    echo "POST is empty!";
    echo " failed!";
}

?>