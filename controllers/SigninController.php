<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/UserDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/SigninValidation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/SigninException.php');

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
    } catch (SigninException $signinException) {
        $message = $signinException->getMessage();
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
