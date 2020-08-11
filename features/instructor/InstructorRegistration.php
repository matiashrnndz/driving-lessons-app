<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/data-access/InstructorDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/features/instructor/InstructorValidation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/features/instructor/InstructorException.php');

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
        redirect();
        // TODO: Send correct message
    } catch (InstructorException $instructorException) {
        $message = $instructorException->getMessage();
        // TODO: Send error message
    }
}

function manageInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function redirect() {
    header("Location: ../../index.php");
}

?>
