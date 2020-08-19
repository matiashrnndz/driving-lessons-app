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
        array("password", $userData['encrypted_password'], "string")
    );
    
    $sql = "INSERT INTO usuarios(usuario_id, email, password, nombre, apellido, ci, direccion, fecha_nacimiento, usuario_tipo_id)
            VALUES (NULL, :email, :password, :name, :lastname, :document, :address, :birthday, 2);";
    
    $db_connection->consulta($sql, $params);
    $db_connection->desconectar();
}

function getUserByEmail($email) {
    $connectionDb = getConnection();
    $connectionDb->conectar();
    
    $params = array(
        array("email", $email, "string"));
    
    $sql = "SELECT u.usuario_id, u.email, u.password, u.nombre, u.apellido, u.ci, u.direccion, u.fecha_nacimiento, ut.descripcion
            FROM usuarios u
                JOIN usuarios_tipos ut ON u.usuario_tipo_id = ut.usuario_tipo_id
            WHERE email = :email;";
    
    $connectionDb->consulta($sql, $params);
    $user = $connectionDb->siguienteRegistro();
    $connectionDb->desconectar();
    
    return $user;
}

function getUsers() {
    $connectionDb = getConnection();
    $connectionDb->conectar();

    $description = 'Usuario';
    
    $params = array(
        array("descripcion", $description, "string"));
    
    $sql = "SELECT u.usuario_id, u.email, u.password, u.nombre, u.apellido, u.ci, u.direccion, u.fecha_nacimiento, ut.descripcion
            FROM usuarios u
                JOIN usuarios_tipos ut ON u.usuario_tipo_id = ut.usuario_tipo_id
            WHERE ut.descripcion = :descripcion;";
    
    $users = null;
    
    if ($connectionDb->consulta($sql, $params)) {
        $users = $connectionDb->restantesRegistros();
    }
    
    $connectionDb->desconectar();
    
    return $users;
}

function approveUser($email) {
    $connectionDb = getConnection();
    $connectionDb->conectar();

    $params = array(
        array("email", $email, "string")
    );
    
    $sql = "UPDATE usuarios
            SET usuario_tipo_id = 3
            WHERE email = :email;";
    
    $message = 'User ' . $email . ' was approved!';
    
    if (!$connectionDb->consulta($sql, $params)) {
        $message = var_dump($connectionDb->ultimoError());
    }
    
    $connectionDb->desconectar();
    
    return $message;
}