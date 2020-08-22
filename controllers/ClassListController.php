<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/ReservationDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/validations/ClassListControllerValidation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/exceptions/ClassListControllerException.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

$date = $instructorId = "";
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $date = manageInput($_POST['classlist_date']);
    $instructorId = manageInput($_POST['classlist_select_instructors']);
     
    $reportData = array(
        "date" => $date,
        "instructorId" => (int) $instructorId
    );
    
    try {
        validateInputs($reportData);
        $classes = getReservationsByInstructorByDate($reportData);
        session_start();
        $_SESSION['reservations'] = $classes;
        header("Location: ../ClassList.php?status=ok");
    } catch (ClassListControllerException $reportData) {
        $message = $reportData->getMessage();
        header("Location: ../ClassList.php?status=err&err_message=".$message);
    }
}

function manageInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
