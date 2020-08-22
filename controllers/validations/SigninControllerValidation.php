<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/UserDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/exceptions/SigninControllerException.php');

function validateInputs($userData) {
    $email = $userData['email'];
    $password = $userData['password'];
    if ($email == null) {
        throw new SigninControllerException("You must enter an email.");
    }
    if (getUserByEmail($email) == null) {
        throw new SigninControllerException("Email is not registered.");
    }
    if ($password == null) {
        throw new SigninControllerException("You must enter a password.");
    }
    if (strcmp(getUserByEmail($email)["password"], $password) != 0) {
        throw new SigninControllerException("Email or Password are incorrect.");
    }
}
