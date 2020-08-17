<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/ReservationDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/LicenseDao.php');

$smarty = GetSmarty();

session_start();
if (isset($_SESSION['session_user'])) {
    unset($_SESSION['session_user']);
}

$usersWithLicense = getCountUsersWithLicense();
$smarty->assign("users_with_license", $usersWithLicense);

$activeUsers = getCountActiveUsers();
$smarty->assign("active_users", $activeUsers);

$smarty->assign("user", null);
$smarty->display("calendar.tpl");

?>
