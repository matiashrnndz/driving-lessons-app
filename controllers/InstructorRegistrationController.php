<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/InstructorDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/InstructorRegistrationValidation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/InstructorRegistrationException.php');
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
        //$smarty->display("blank.tpl");
        header("Location: ../InstructorRegistration.php");
        //die("Error");
        // TODO: Send correct message
    } catch (InstructorException $instructorException) {
        //session_start();
        //$_SESSION['err_message']
        $message = $instructorException->getMessage();
        header("Location: ../InstructorRegistration.php?err_message=".$message);
        //die("Error");
        // TODO: Send error message
    }
}

function manageInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
