<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/UserDao.php');

$smarty = GetSmarty();

session_start();
if (isset($_SESSION['session_user'])) {
    $user = $_SESSION['session_user'];
    $smarty->assign("user", $user);
}

$users = getUsers();
$smarty->assign("users", $users);

$smarty->display("client-approval.tpl");

?>
