<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/InstructorDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/validations/InstructorRegistrationValidation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/exceptions/InstructorRegistrationException.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

$smarty = GetSmarty();

$name = $lastname = $document = $birthday = $license = "";
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = manageInput($_POST['instructor_name']);
    $lastname = manageInput($_POST['instructor_lastname']);
    $document = manageInput($_POST['instructor_document']);
    $birthday = manageInput($_POST['instructor_birthday']);
    $license = manageInput($_POST['instructor_license_expiration']);
    
    $instructorData = array(
        "name" => $name,
        "lastname" => $lastname,
        "document" => $document,
        "birthday" => $birthday,
        "license" => $license
    );
    
    try {
        validateInputs($instructorData);
        addInstructor($instructorData);
        header("Location: ../InstructorRegistration.php?status=ok");
    } catch (InstructorRegistrationException $instructorRegistrationException) {
        $message = $instructorRegistrationException->getMessage();
        header("Location: ../InstructorRegistration.php?status=err&err_message=".$message);
    }
}

function manageInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
