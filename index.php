<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

ini_set("display_errors", 1);

$smarty = GetSmarty();

session_start();
if (isset($_SESSION['session_user'])) {
    $user = $_SESSION['session_user'];
    $smarty->assign("user", $user);
    $smarty->display("index.tpl");
} else {
    $smarty->assign("user", null);
    $smarty->display("index.tpl");
}

?>
