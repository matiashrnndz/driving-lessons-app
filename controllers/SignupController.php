<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/UserDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/SignupValidation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/SignupException.php');

$name = $lastname = $document = $address = $email = $password = $birthday = "";
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = manageInput($_POST['signup_name']);
    $lastname = manageInput($_POST['signup_lastname']);
    $document = manageInput($_POST['signup_document']);
    $address = manageInput($_POST['signup_address']);
    $email = manageInput($_POST['signup_email']);
    $password = manageInput($_POST['signup_password']);
    $encrypted_password = managePassword($password);
    $birthday = manageInput($_POST['signup_birthday']);
    
    $userData = array(
        "name" => $name,
        "lastname" => $lastname,
        "document" => $document,
        "address" => $address,
        "email" => $email,
        "password" => $password,
        "encrypted_password" => $encrypted_password,
        "birthday" => $birthday
    );
    
    try {
        validateInputs($userData);
        addUser($userData);
        header("Location: ../Signup.php?status=ok");
    } catch (SignupException $signupException) {
        $message = $signupException->getMessage();
        header("Location: ../Signup.php?status=err&err_message=".$message);
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

?>
