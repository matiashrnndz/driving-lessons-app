<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

$smarty = GetSmarty();

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $smarty->assign("status", $status);
    switch ($status){
        case "err":
            if (isset($_GET["err_message"])) {
                $message = $_GET['err_message'];
                $smarty->assign("err_message", $message);
            }
            $smarty->assign("user", null);
            $smarty->display("signin.tpl");
            break;
        case "ok":
            session_start();
            $user = $_SESSION['session_user'];
            $smarty->assign("err_message", null);
            $smarty->assign("user", $user);
            $smarty->display("index.tpl");
            break;
        default:
            $smarty->assign("err_message", null);
            $smarty->assign("user", null);
            $smarty->display("signin.tpl");
            break;
    }
} else {
    $smarty->assign("status", null);
    $smarty->assign("err_message", null);
    $smarty->assign("user", null);
    $smarty->display("signin.tpl");
}

?>
