<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

$smarty = GetSmarty();

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $smarty->assign("status", $status);
    if (strcmp($status, "err") == 0 && isset($_GET["err_message"])) {
        $message = $_GET['err_message'];
        $smarty->assign("err_message", $message);
    }
}

$smarty->display("signup.tpl");

?>