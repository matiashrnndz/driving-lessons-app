<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

function addUser($userData) {
    $db_connection = getConnection();
    $db_connection->conectar();
    
    $params = array(
        array("name", $userData['name'], "string"),
        array("lastname", $userData['lastname'], "string"),
        array("birthday", $userData['birthday'], "string"),
        array("address", $userData['address'], "string"),
        array("document", $userData['document'], "string"),
        array("email", $userData['email'], "string"),
        array("password", $userData['password'], "string")
    );
    
    $sql = "INSERT INTO `usuarios`(`usuario_id`, `email`, `password`, "
            . "`nombre`, `apellido`, `ci`, `direccion`, "
            . "`fecha_nacimiento`, `usuario_tipo_id`) "
            . "VALUES (NULL,:email,:password,:name,"
            . ":lastname,:document,:address,:birthday, 2)";
    
    $db_connection->consulta($sql, $params);
    $db_connection->desconectar();
}

function getUserByEmail($email) {
    $connectionDb = getConnection();
    $connectionDb->conectar();
    
    $params = array(
        array("email", $email, "string"));
    
    $sql = "SELECT * 
            FROM usuarios 
            WHERE email = :email";
    
    $connectionDb->consulta($sql, $params);
    $user = $connectionDb->siguienteRegistro();
    $connectionDb->desconectar();
    
    return $user;
}