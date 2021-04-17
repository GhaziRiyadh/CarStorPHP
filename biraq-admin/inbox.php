<?php
    session_start();
    if(!isset($_SESSION['emp_id'])){ //if login in session is not set
        header("Location: ./login.html");
    }
    include("./widgets/header.php");
    get_header("البريد"); //$pos
    include("./widgets/nav.php");
    get_nav(1);
    include("./widgets/inbox_area.php");
    get_inbox();
    include("./widgets/footer.php");
    get_footer();
    include("./widgets/js.php");
?>