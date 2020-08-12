<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

$smarty = GetSmarty();

if ( isset($_GET['err_message']) && count($_GET) >= 1 ) {
    $message = $_GET['err_message'];
    $smarty->assign("err_message", $message);
}

$smarty->display("instructor-registration.tpl");

?>