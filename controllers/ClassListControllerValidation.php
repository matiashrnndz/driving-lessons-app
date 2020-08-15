<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/InstructorDao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/controllers/ClassListControllerException.php');

function validateInputs($reportData) {
    validateDate($reportData['date']);
    validateInstructor($reportData);
}

function validateDate($date) {
    if ($date == null) {
        throw new ClassListControllerException("You must enter a date.");
    }
}

function validateInstructor($reportData) {
    $instructorId = $reportData[instructorId];
    if ($instructorId == null) {
        throw new ClassListControllerException("You must select an instructor.");
    }
    if (!existsInstructor($instructorId)) {
        throw new ClassListControllerException("The instructor selected does not exist.");
    }
}

?>
