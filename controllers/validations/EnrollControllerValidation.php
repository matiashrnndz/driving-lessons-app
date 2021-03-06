<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/ReservationDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/InstructorDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/exceptions/EnrollControllerException.php');

function validateInputs($reservationData) {
    validateDate($reservationData['date']);
    validateTime($reservationData['time']);
    validateInstructor($reservationData);
    validateUser($reservationData);
}

function validateDate($date) {
    if ($date == null) {
        throw new EnrollControllerException("You must enter a date.");
    }
    $timezone = new DateTimeZone("America/Montevideo");
    $date_aux = new DateTime($date, $timezone);
    $today = new DateTime("now", $timezone);
    if ($date_aux <= $today) {
        throw new EnrollControllerException("The date must be greater than today.");
    }
    if (date('N', strtotime($date)) >= 6) {
        throw new EnrollControllerException("Weekend days cannot be selected.");
    }
}

function validateTime($time) {
    if ($time == null) {
        throw new EnrollControllerException("You must select a time.");
    }
}

function validateInstructor($reservationData) {
    $instructorId = $reservationData['instructorId'];
    if ($instructorId == null) {
        throw new EnrollControllerException("You must select an instructor.");
    }
    if (!existsInstructor($instructorId)) {
        throw new EnrollControllerException("The instructor selected does not exist.");
    }
    if (existsRegistration($reservationData)) {
        throw new EnrollControllerException("The instructor is not available.");
    }
}

function validateUser($reservationData) {
    $userId = $reservationData['userId'];
    if ($userId == null) {
        throw new EnrollControllerException("You must be a registered user.");
    }
    if (existsRegistrationByUser($reservationData)) {
        throw new EnrollControllerException("The user already has a class in that moment.");
    }
}

?>
