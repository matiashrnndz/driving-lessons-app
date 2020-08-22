<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/UserDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/validations/SigninControllerValidation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/exceptions/SigninControllerException.php');

$email = $password = "";
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = manageInput($_POST['signin_email']);
    $password = managePassword($_POST['signin_password']);
    
    $userData = array(
        "email" => $email,
        "password" => $password
    );
    
    try {
        validateInputs($userData);
        $user = getUserByEmail($email);
        createSession($user);
        header("Location: ../Signin.php?status=ok");
    } catch (SigninControllerException $signinControllerException) {
        $message = $signinControllerException->getMessage();
        header("Location: ../Signin.php?status=err&err_message=".$message);
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

function createSession($user) {
    session_start();
    $_SESSION['session_user'] = $user;
}

?>
