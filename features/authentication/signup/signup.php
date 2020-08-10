<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/data-access/UserDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/features/authentication/signup/SignupValidation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/features/authentication/signup/SignupException.php');

$name = $lastname = $document = $address = $email = $password = $birthday = "";
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = manageInput($_POST['signup_name']);
    $lastname = manageInput($_POST['signup_lastname']);
    $document = manageInput($_POST['signup_document']);
    $address = manageInput($_POST['signup_address']);
    $email = manageInput($_POST['signup_email']);
    $password = managePassword($_POST['signup_password']);
    $birthday = manageInput($_POST['signup_birthday']);
    
    $userData = array(
        "name" => $name,
        "lastname" => $lastname,
        "document" => $document,
        "address" => $address,
        "email" => $email,
        "password" => $password,
        "birthday" => $birthday
    );
    
    try {
        validateInputs($userData);
        addUser($userData);
        redirect();
        // TODO: Send correct message
    } catch (SignupException $signupException) {
        $message = $signupException->getMessage();
        // TODO: Send error message
    }
}

function manageInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function managePassword($data) {
  return md5($data);
}

function redirect() {
    header("Location: ../../../index.php");
}

?>
