<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/ReservationDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/LicenseDao.php');

$smarty = GetSmarty();

$usersWithLicense = getCountUsersWithLicense();
$smarty->assign("users_with_license", $usersWithLicense);

$activeUsers = getCountActiveUsers();
$smarty->assign("active_users", $activeUsers);

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
            $smarty->display("calendar.tpl");
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
