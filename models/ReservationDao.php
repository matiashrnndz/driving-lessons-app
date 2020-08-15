<?php

function addReservation($reservationData) {
    $connectionDb = getConnection();
    $connectionDb->conectar();
    
    $params = array(
        array("date", $reservationData['date'], "string"),
        array("time", $reservationData['time'], "int"),
        array("instructorId", $reservationData['instructorId'], "int"),
        array("userId", $reservationData['userId'], "int")
    );

    $sql = "INSERT INTO `reservas`(`reserva_id`, `fecha`, `hora`, "
        . "`instructor_id`, `usuario_id`) "
        . "VALUES (NULL,:date,:time,:instructorId,"
        . ":userId)";
    
    $connectionDb->consulta($sql, $params);
    $connectionDb->desconectar();
}

function existsRegistration($reservationData) {
    $connectionDb = getConnection();
    $connectionDb->conectar();

    $params = array(
        array("instructorId", $reservationData[instructorId], "int"),
        array("date", $reservationData[date], "string"),
        array("time", $reservationData[time], "int")
    );
    
    $sql = "SELECT *
            FROM reservas
            WHERE instructor_id = :instructorId
                AND fecha = :date
                AND hora = :time";
    
    $reservationExists = FALSE;
    
    $connectionDb->consulta($sql, $params);
    
    if ($connectionDb->cantidadRegistros() > 0) {
        $reservationExists = TRUE;
    }
    
    $connectionDb->desconectar();
    
    return $reservationExists;
}