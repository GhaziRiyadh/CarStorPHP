<?php
    session_start(); 
    if(!isset($_SESSION['emp_id'])){ //if login in session is not set
      header("Location: ./login.html");
	}
	require_once("./widgets/db.php");
    include("./widgets/header.php");
    get_header("إضافة موظف/مسئول"); //$pos
    include("./widgets/nav.php");
	get_nav(2);
    include("./widgets/add_peer.php");
    add_car_item();
    include("./widgets/footer.php");
    get_footer();
    include("./widgets/js.php");
?>