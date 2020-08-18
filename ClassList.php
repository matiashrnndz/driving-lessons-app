<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/InstructorDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/ReservationDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/LicenseDao.php');

$smarty = GetSmarty();

$instructors = getInstructors();
$smarty->assign("instructors", $instructors);

$usersWithLicense = getCountUsersWithLicense();
$smarty->assign("users_with_license", $usersWithLicense);

$activeUsers = getCountActiveUsers();
$smarty->assign("active_users", $activeUsers);

session_start();
if (isset($_SESSION['session_user'])) {
    $user = $_SESSION['session_user'];
    $smarty->assign("user", $user);
}

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $smarty->assign("status", $status);
    if (strcmp($status, "err") == 0 && isset($_GET["err_message"])) {
        $message = $_GET['err_message'];
        $smarty->assign("err_message", $message);
        $smarty->display("class-list.tpl");
    } else {
        $smarty->assign("reservations", $_SESSION['reservations']);
        $smarty->display("class-list-display.tpl");
    }
} else {
    $smarty->display("class-list.tpl");
}

?>
