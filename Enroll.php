<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/InstructorDao.php');

$smarty = GetSmarty();

session_start();
if (isset($_SESSION['session_user'])) {
    $user = $_SESSION['session_user'];
    $smarty->assign("user", $user);
}

$instructors = getInstructors();
$smarty->assign("instructors", $instructors);

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $smarty->assign("status", $status);
    if (strcmp($status, "err") == 0 && isset($_GET["err_message"])) {
        $message = $_GET['err_message'];
        $smarty->assign("err_message", $message);
    }
}

$smarty->display("enroll.tpl");

?>
