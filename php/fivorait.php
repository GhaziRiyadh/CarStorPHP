<?php if (isset($_GET['cookie_key']) and isset($_GET['car'])) {
    setcookie('fivorate_car[' . $_GET['cookie_key'] . ']', null, +200000);
}
