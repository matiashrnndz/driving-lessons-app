<?php
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

ini_set("display_errors", 1);

$smarty = GetSmarty();

checkIfSesionExists();

$smarty->display("index.tpl");

function checkIfSesionExists() {
    session_start();
    if (isset($_SESSION['session_user'])) {
        
    }
}
?>
