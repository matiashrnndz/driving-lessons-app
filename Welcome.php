<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

$smarty = GetSmarty();

$usersWithLicense = getCountUsersWithLicense();
$smarty->assign("users_with_license", $usersWithLicense);

$activeUsers = getCountActiveUsers();
$smarty->assign("active_users", $activeUsers);

session_start();
if (isset($_SESSION['session_user'])) {
    $user = $_SESSION['session_user'];
    $smarty->assign("user", $user);
    $smarty->display("index.tpl");
} else {
    $smarty->display("welcome.tpl");
}



?>