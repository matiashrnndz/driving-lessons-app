<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/data-access/UserDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/features/authentication/signin/SigninException.php');

function validateInputs($userData) {
    $email = $userData['email'];
    $password = $userData['password'];
    if ($email == null) {
        throw new SigninException("You must enter an email.");
    }
    if (getUserByEmail($email) == null) {
        throw new SigninException("Email is not registered.");
    }
    if ($password == null) {
        throw new SigninException("You must enter a password.");
    }
    if (strcmp(getUserByEmail($email)["password"], $password) != 0) {
        throw new SigninException("Email or Password are incorrect.");
    }
}
