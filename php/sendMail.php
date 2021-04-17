<?php
include 'config.php';
if (!empty(trim($_POST['subemail']))) {
    $pdo->query("insert into sendemail (email) value (:email)");
    $profileAfter->bindParam(":email", trim($_POST['subemail']), PDO::PARAM_STR);
}
