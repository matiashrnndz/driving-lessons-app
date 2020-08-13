<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

$smarty = GetSmarty();

session_start();
if (isset($_SESSION['session_user'])) {
    unset($_SESSION['session_user']);
}

$smarty->assign("user", null);
$smarty->display("index.tpl");

?>
