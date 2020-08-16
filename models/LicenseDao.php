<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

function addLicense($usuarioId) {
    $connectionDb = getConnection();
    $connectionDb->conectar();
    
    $date = new DateTime();
    $date = $date->format('Y-m-d');
    $params = array(
        array("usuarioId", $usuarioId, "int"),
        array("date", $date, "string")
    );

    $sql = "INSERT INTO `libretas`(`libreta_id`, `fecha`, `usuario_id`) "
        . "VALUES (NULL,:date,:usuarioId)";
    
    $connectionDb->consulta($sql, $params);
    $connectionDb->desconectar();
}

?>
