<?php

$email = $password = "";
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = manage_input($_POST['signin_email']);
    $password = manage_password($_POST['signin_password']);
    
    //TODO: Get user by email
    $user = array(
        "name" => 'Matias',
        "lastname" => "Hernandez",
        "document" => "4.584.147-5",
        "address" => "Calle",
        "email" => $email,
        "password" => $password,
        "birthday" => "25-09-1991"
    );
    
    createSession($user);
    goToIndex();
}

function manage_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function manage_password($data) {
  return md5($data);
}

function goToIndex() {
    header("Location: ../../index.php");
}

function createSession($user) {
    session_start();
    $_SESSION['session_user'] = $user;
}

?>