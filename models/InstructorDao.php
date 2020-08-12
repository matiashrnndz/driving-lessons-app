<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

function addInstructor($instructorData) {
    $db_connection = getConnection();
    $db_connection->conectar();
    
    $params = array(
        array("name", $instructorData['name'], "string"),
        array("lastname", $instructorData['lastname'], "string"),
        array("document", $instructorData['document'], "string"),
        array("birthday", $instructorData['birthday'], "string"),
        array("license", $instructorData['license'], "string")
    );
    
    /*
    $sql = "INSERT INTO instructores (instructor_id, nombre, apellido, fecha_nacimiento, ci, vencimiento) 
            VALUES (NULL, :name, :lastname, :birthday, :document, :license);";
    */
    /*
    $sql = "INSERT INTO `instructores`"
            . "(`instructor_id`, `nombre`, `apellido`, `fecha_nacimiento`, `ci`, `vencimiento`)"
            . "VALUES (NULL,:name,:lastname,:birthday,:document,:license)";
    */
    
    $sql = "INSERT INTO `instructores`(`instructor_id`, `nombre`, `apellido`, "
        . "`fecha_nacimiento`, `ci`, `vecimiento`) "
        . "VALUES (NULL,:name,:lastname,:birthday,"
        . ":document,:license)";
    
    $db_connection->consulta($sql, $params);
    $db_connection->desconectar();
}