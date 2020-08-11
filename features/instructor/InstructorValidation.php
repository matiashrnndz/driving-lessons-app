<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/data-access/InstructorDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/features/instructor/InstructorException.php');

function validateInputs($instructorData) {
    validateName($instructorData['name']);
    validateLastname($instructorData['lastname']);
    validateDocument($instructorData['document']);
    validateBirthday($instructorData['birthday']);
    validateLicense($instructorData['license']);
}

function validateName($name) {
    if ($name == null) {
        throw new InstructorException("You must enter a name.");
    }
}

function validateLastname($lastname) {
    if ($lastname == null) {
        throw new InstructorException("You must enter a lastname.");
    }
}

function validateDocument($document) {
    if ($document == null) {
        throw new InstructorException("You must enter a document.");
    }
}

function validateBirthday($birthday) {
    if ($birthday == null) {
        throw new InstructorException("You must enter a birthday.");
    }
    $birthday_aux = new DateTime($birthday);
    $birthday_aux->add(new DateInterval("P18Y"));
    if($birthday_aux >= new DateTime()) {
        throw new InstructorException("Instructor must be 18 years or older.");
    }
}

function validateLicense($license) {
    if ($license == null) {
        throw new InstructorException("You must enter a license expiration date.");
    }
    $license_aux = new DateTime($license);
    if ($license_aux < new DateTime()) {
        throw new InstructorException("The driving license cannot be expired.");
    }
}
