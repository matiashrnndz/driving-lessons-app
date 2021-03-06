<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/InstructorDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/exceptions/InstructorRegistrationException.php');

function validateInputs($instructorData) {
    validateName($instructorData['name']);
    validateLastname($instructorData['lastname']);
    validateDocument($instructorData['document']);
    validateBirthday($instructorData['birthday']);
    validateLicense($instructorData['license']);
}

function validateName($name) {
    if ($name == null) {
        throw new InstructorRegistrationException("You must enter a name.");
    }
}

function validateLastname($lastname) {
    if ($lastname == null) {
        throw new InstructorRegistrationException("You must enter a lastname.");
    }
}

function validateDocument($document) {
    if ($document == null) {
        throw new InstructorRegistrationException("You must enter a document.");
    }
}

function validateBirthday($birthday) {
    if ($birthday == null) {
        throw new InstructorRegistrationException("You must enter a birthday.");
    }
    $timezone = new DateTimeZone("America/Montevideo");
    $birthday_aux = new DateTime($birthday, $timezone);
    $birthday_aux->add(new DateInterval("P18Y"));
    $today = new DateTime("now", $timezone);
    if($birthday_aux >= $today) {
        throw new InstructorRegistrationException("Instructor must be 18 years or older.");
    }
}

function validateLicense($license) {
    if ($license == null) {
        throw new InstructorRegistrationException("You must enter a license expiration date.");
    }
    $license_aux = new DateTime($license);
    if ($license_aux < new DateTime()) {
        throw new InstructorRegistrationException("The driving license cannot be expired.");
    }
}
