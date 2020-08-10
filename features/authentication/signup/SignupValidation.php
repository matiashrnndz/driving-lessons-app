<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/data-access/UserDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/features/authentication/signup/SignupException.php');

function validateInputs($userData) {
    validateName($userData['name']);
    validateLastname($userData['lastname']);
    validateDocument($userData['document']);
    validateAddress($userData['address']);
    validateEmail($userData['email']);
    validatePassword($userData['password']);
    validateBirthday($userData['birthday']);
}

function validateName($name) {
    if ($name == null) {
        throw new SignupException("You must enter a name.");
    }
}

function validateLastname($lastname) {
    if ($lastname == null) {
        throw new SignupException("You must enter a lastname.");
    }
}

function validateDocument($document) {
    if ($document == null) {
        throw new SignupException("You must enter a document.");
    }
}

function validateAddress($address) {
    if ($address == null) {
        throw new SignupException("You must enter an address.");
    }
}

function validateEmail($email) {
    if ($email == null) {
        throw new SignupException("You must enter an email.");
    }
    if (getUserByEmail($email) != null) {
        throw new SignupException("The email is already used by another user.");
    }
}

function validatePassword($password) {
    if ($password == null) {
        throw new SignupException("You must enter a password.");
    }
    if (strlen($password) >= 6) {
        throw new SignupException("The password must have atleast 6 characters.");
    }
}

function validateBirthday($birthday) {
    if ($birthday == null) {
        throw new SignupException("You must enter a birthday.");
    }
    $birthday_aux = new DateTime($birthday);
    $birthday_aux->add(new DateInterval("P18Y"));
    if($birthday_aux >= new DateTime()) {
        throw new SignupException("You must be 18 years or older.");
    }
}
