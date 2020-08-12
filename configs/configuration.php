<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/includes/class.Conexion.BD.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/includes/libs/Smarty.class.php');

function getConnection() {
    $conn = new ConexionBD("mysql", "localhost", "obligatorio", "root", "root");
    return $conn;
}

function GetSmarty() {
    $smarty = new Smarty();
    $smarty->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/driving-lessons/views/';
    $smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'] . '/driving-lessons/tmp/templates_c/';
    $smarty->config_dir = $_SERVER['DOCUMENT_ROOT'].'/driving-lessons/configs/';
    $smarty->cache_dir = $_SERVER['DOCUMENT_ROOT'].'/driving-lessons/cache/';
    return $smarty;
}

?>
