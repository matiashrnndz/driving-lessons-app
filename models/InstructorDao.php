<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

function addInstructor($instructorData) {
    $connectionDb = getConnection();
    $connectionDb->conectar();
    
    $params = array(
        array("name", $instructorData['name'], "string"),
        array("lastname", $instructorData['lastname'], "string"),
        array("document", $instructorData['document'], "string"),
        array("birthday", $instructorData['birthday'], "string"),
        array("license", $instructorData['license'], "string")
    );

    $sql = "INSERT INTO instructores(instructor_id, nombre, apellido, fecha_nacimiento, ci, vencimiento)
            VALUES (NULL, :name, :lastname, :birthday, :document, :license);";

    $connectionDb->consulta($sql, $params);
    $connectionDb->desconectar();
}

function getInstructors() {
    $connectionDb = getConnection();
    $connectionDb->conectar();

    $sql = "SELECT instructor_id, nombre, apellido, fecha_nacimiento, ci, vencimiento
            FROM instructores
            WHERE vencimiento > now();";
    
    $instructors = null;
    
    if ($connectionDb->consulta($sql)) {
        $instructors = $connectionDb->restantesRegistros();
    }
    
    $connectionDb->desconectar();
    
    return $instructors;
}

function existsInstructor($instructorId) {
    $connectionDb = getConnection();
    $connectionDb->conectar();

    $params = array(
        array("instructorId", $instructorId, "int")
    );
    
    $sql = "SELECT *
            FROM instructores
            WHERE instructor_id = :instructorId;";
    
    $instructorExists = FALSE;
    
    if ($connectionDb->consulta($sql, $params)) {
        $instructorExists = TRUE;
    }
    
    $connectionDb->desconectar();
    
    return $instructorExists;
}