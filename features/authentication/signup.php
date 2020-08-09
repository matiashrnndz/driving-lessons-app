<?php

$name = $lastname = $document = $address = $email = $password = $birthday = "";
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = manage_input($_POST['signup_name']);
    $lastname = manage_input($_POST['signup_lastname']);
    $document = manage_input($_POST['signup_document']);
    $address = manage_input($_POST['signup_address']);
    $email = manage_input($_POST['signup_email']);
    $password = manage_password($_POST['signup_password']);
    $birthday = manage_input($_POST['signup_birthday']);
    
    if (!validate($name, $lastname, $document, $address, $email, $password, $birthday)) {
        
    } else {
        goToIndex();
    }
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

function validate($name, $lastname, $document, $address, $email, $password, $birthday) {
    return validateName($name) && validateLastname($lastname) && validateDocument($document) && validateAddress($address) && validateEmail($email) && validatePassword($password) && validateBirthday($birthday);
}

function validateName($name) {
    $is_valid = $name != null;
    return $is_valid;
}

function validateLastname($lastname) {
    $is_valid = $lastname != null;
    return $is_valid;
}

function validateDocument($document) {
    $is_valid = $document != null;
    return $is_valid;
}

function validateAddress($address) {
    $is_valid = $address != null;
    return $is_valid;
}

function validateEmail($email) {
    // TODO: Validate not another user with the same email
    $is_valid = $email != null;
    return $is_valid;
}

function validatePassword($password) {
    $is_valid = $password != null && strlen($password) >= 6;
    return $is_valid;
}

function validateBirthday($birthday) {
    // TODO: Validate more than 18 years
    $is_valid = $birthday != null;
    return $is_valid;
}

function goToIndex() {
    header("Location: ../../index.php");
}

?>
