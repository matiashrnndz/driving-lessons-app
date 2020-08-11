<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/data-access/UserDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/features/authentication/signin/SigninValidation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/features/authentication/signin/SigninException.php');

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
        print '<script type="text/javascript">'; 
        print 'alert("The Customer is NOW registered")'; 
        print '</script>';
        sleep(3);
        //session_start();
        //$_SESSION['message'] = "User was created successfully!";
        //header("Location: ../../../index.php");
         
        // TODO: Send correct message
    } catch (SigninException $signinException) {
        $message = $signinException->getMessage();
        print '<script type="text/javascript">'; 
        print 'alert("The Customer is NOW registered")'; 
        print '</script>'; 
        sleep(3);
        //redirect();
        //session_start();
        //$_SESSION['errorMessage'] = $message;
        //$_SESSION['errorDir'] = 
        //echo "<script> alert('$message') </script>";
        //echo "<b>Error:</b> $message <br>";
        // die("Error: " . $message);
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

function createSession($user) {
    session_start();
    $_SESSION['session_user'] = $user;
}

function redirect() {
    header("Location: ../../../index.php");
}

?>