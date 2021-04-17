<?php
    session_start(); 
    setcookie("biraq", "", 21600);
    if(!isset($_SESSION['emp_id'])){ //if login in session is not set
      header("Location: ./login.html");
	}
	require_once("./widgets/db.php");
    include("./widgets/header.php");
    get_header("تواصل"); //$pos
    include("./widgets/nav.php");
	get_nav(2);
    include("./widgets/contacts.php");
    get_contacts();
    include("./widgets/footer.php");
    get_footer();
    include("./widgets/js.php");
?>