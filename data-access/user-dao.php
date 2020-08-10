<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

function add_user($userData) {
    $db_connection = get_connection();
    $db_connection->conectar();
    
    $date = $userData['birthday'] . str_replace("/", "-");
    $params = array(
        array("name", $userData['name'], "string"),
        array("lastname", $userData['lastname'], "string"),
        array("birthday", $date, "string"),
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
