<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

function addReservation($reservationData) {
    $connectionDb = getConnection();
    $connectionDb->conectar();
    
    $params = array(
        array("date", $reservationData['date'], "string"),
        array("time", $reservationData['time'], "int"),
        array("instructorId", $reservationData['instructorId'], "int"),
        array("userId", $reservationData['userId'], "int")
    );

    $sql = "INSERT INTO reservas(reserva_id, fecha, hora, instructor_id, usuario_id)
            VALUES (NULL, :date, :time, :instructorId, :userId);";
    
    $connectionDb->consulta($sql, $params);
    $connectionDb->desconectar();
}

function existsRegistration($reservationData) {
    $connectionDb = getConnection();
    $connectionDb->conectar();

    $params = array(
        array("instructorId", $reservationData['instructorId'], "int"),
        array("date", $reservationData['date'], "string"),
        array("time", $reservationData['time'], "int")
    );
    
    $sql = "SELECT *
            FROM reservas
            WHERE instructor_id = :instructorId
                AND fecha = :date
                AND hora = :time;";
    
    $reservationExists = FALSE;
    
    $connectionDb->consulta($sql, $params);
    
    if ($connectionDb->cantidadRegistros() > 0) {
        $reservationExists = TRUE;
    }
    
    $connectionDb->desconectar();
    
    return $reservationExists;
}

function existsRegistrationByUser($reservationData) {
    $connectionDb = getConnection();
    $connectionDb->conectar();

    $params = array(
        array("userId", $reservationData['userId'], "int"),
        array("date", $reservationData['date'], "string"),
        array("time", $reservationData['time'], "int")
    );
    
    $sql = "SELECT *
            FROM reservas
            WHERE usuario_id = :userId
                AND fecha = :date
                AND hora = :time;";
    
    $reservationExists = FALSE;
    
    $connectionDb->consulta($sql, $params);
    
    if ($connectionDb->cantidadRegistros() > 0) {
        $reservationExists = TRUE;
    }
    
    $connectionDb->desconectar();
    
    return $reservationExists;
}

function getReservationsByInstructorByDate($reservationData) {
    $connectionDb = getConnection();
    $connectionDb->conectar();

    $params = array(
        array("instructorId", $reservationData['instructorId'], "int"),
        array("date", $reservationData['date'], "string")
    );
    
    $sql = "SELECT i.nombre, i.apellido, r.fecha, r.hora, u.nombre AS usuario_nombre, u.apellido AS usuario_apellido, u.direccion AS usuario_direccion
            FROM reservas r
                JOIN usuarios u ON u.usuario_id = r.usuario_id
                JOIN instructores i ON i.instructor_id = r.instructor_id
            WHERE r.instructor_id = :instructorId
                AND r.fecha = :date
            ORDER BY i.nombre, i.apellido, r.fecha, r.hora;";
    
    $class_list = null;
    
    if ($connectionDb->consulta($sql, $params)) {
        $class_list = $connectionDb->restantesRegistros();
    }
    
    $connectionDb->desconectar();
    
    return $class_list;
}

function getUsersReadyToConfirmLicense() {
    $connectionDb = getConnection();
    $connectionDb->conectar();

    $sql = "SELECT u.usuario_id, u.email, u.nombre, u.apellido, count(*) AS cant_clases
            FROM reservas r
                  JOIN usuarios u ON u.usuario_id = r.usuario_id
            WHERE u.usuario_id NOT IN (SELECT usuario_id FROM libretas)
                  AND r.fecha < CURDATE()
            GROUP BY u.usuario_id
            HAVING cant_clases >= 15;";
    
    $users = null;
    
    if ($connectionDb->consulta($sql)) {
        $users = $connectionDb->restantesRegistros();
    }
    
    $connectionDb->desconectar();
    
    return $users;
}

function getCountActiveUsers() {
    $connectionDb = getConnection();
    $connectionDb->conectar();

    $sql = "SELECT COUNT(*) AS active_users
            FROM (SELECT usuario_id
                  FROM reservas
                  WHERE usuario_id NOT IN (SELECT usuario_id FROM libretas)
                  GROUP BY usuario_id
            ) users;";
    
    $count = 0;
    if($connectionDb->consulta($sql)) {
        $restantesRegistros = $connectionDb->restantesRegistros();
        if(!empty($restantesRegistros)) {
            $count = $restantesRegistros[0]['active_users'];
        }
    }
    
    $connectionDb->desconectar();
    
    return $count;
}

function getAvailability($date) {
    $connectionDb = getConnection();
    $connectionDb->conectar();

    $params = array(
        array("date", $date, "string")
    );
    
    $sql = "SELECT (r.cantReservas * 100) / (i.cantInstructores * 14) AS pct
            FROM (SELECT count(*) AS cantInstructores FROM instructores) i,
                 (SELECT count(*) AS cantReservas FROM reservas WHERE fecha = :date) r;";
    
    $pct = 0;
    if($connectionDb->consulta($sql, $params)) {
        $restantesRegistros = $connectionDb->restantesRegistros();
        if(!empty($restantesRegistros)) {
            $pct = $restantesRegistros[0]['pct'];
        }
    }
    
    $connectionDb->desconectar();
    
    return $pct;
}

?>
