<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/ReservationDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/InstructorDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/EnrollControllerException.php');

function validateInputs($reservationData) {
    validateDate($reservationData['date']);
    validateTime($reservationData['time']);
    validateInstructor($reservationData);
}

function validateDate($date) {
    if ($date == null) {
        throw new EnrollControllerException("You must enter a date.");
    }
    $date_aux = new DateTime($date);
    if ($date_aux <= new DateTime()) {
        throw new EnrollControllerException("The date must be greater than today.");
    }
}

function validateTime($time) {
    if ($time == null) {
        throw new EnrollControllerException("You must select a time.");
    }
}

function validateInstructor($reservationData) {
    $instructorId = $reservationData[instructorId];
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

?>
