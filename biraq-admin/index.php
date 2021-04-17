<?php
    session_start(); 
    setcookie("biraq", "", 21600);
    if(!isset($_SESSION['emp_id'])){ //if login in session is not set
      header("Location: ./login.html");
	}
	require_once("./widgets/db.php");
    include("./widgets/header.php");
    get_header("الإدارة"); //$pos
    include("./widgets/nav.php");
	get_nav(0);
    include("./widgets/traffic_n_sales.php");
    get_tns(0, 0); //$traf, $sale
    include("./widgets/sale_stats.php");
    get_salestat(null, 16, 125, 27); //$sale_stat, $view_count, $link_press, $traf
    include("./widgets/email_stats.php");
    get_mailstat(55, 75, 35, 45); //$all, $replay, $done, $wait
    include("./widgets/emplo_act.php");
    get_emp_act();
    include("./widgets/recent_items.php");
    get_recent_items();
    include("./widgets/realtime_stats.php");
    get_realtime_stats(435456,4927); //$visit_24h, $visit_30m
    include("./widgets/chats.php");
    get_chats();
    include("./widgets/chatbox.php");
    get_chatbox();
    include("./widgets/footer.php");
    get_footer();
    include("./widgets/js.php");
?>