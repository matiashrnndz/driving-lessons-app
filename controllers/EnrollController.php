<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/ReservationDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/validations/EnrollControllerValidation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/exceptions/EnrollControllerException.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');

$date = $time = $instructorId = $userId = "";
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    session_start();
    $userId = $_SESSION['session_user'][usuario_id];
    $date = manageInput($_POST['enroll_date']);
    $time = manageInput($_POST['enroll_select_time']);
    $instructorId = manageInput($_POST['enroll_select_instructors']);
     
    $reservationData = array(
        "date" => $date,
        "time" => (int) $time,
        "instructorId" => (int) $instructorId,
        "userId" => (int) $userId
    );
    
    try {
        validateInputs($reservationData);
        addReservation($reservationData);
        header("Location: ../Enroll.php?status=ok");
    } catch (EnrollControllerException $reservationData) {
        $message = $reservationData->getMessage();
        header("Location: ../Enroll.php?status=err&err_message=".$message);
    }
}

function manageInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
