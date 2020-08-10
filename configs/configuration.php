<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/include/class.Conexion.BD.php');

function getConnection() {
    $conn = new ConexionBD("mysql", "localhost", "obligatorio", "root", "root");
    return $conn;
}

?>
