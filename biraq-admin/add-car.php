<?php
    session_start(); 
    setcookie("biraq", "", 21600);
    if(!isset($_SESSION['emp_id'])){ //if login in session is not set
      header("Location: ./login.html");
	}
	require_once("./widgets/db.php");
    include("./widgets/header.php");
    get_header("إضافة سيارة"); //$pos
    include("./widgets/nav.php");
	get_nav(-1);
    include("./widgets/add_car_item.php");
    add_car_item();
    include("./widgets/footer.php");
    get_footer();
    include("./widgets/js.php");
?>