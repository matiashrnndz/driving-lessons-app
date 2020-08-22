<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/configs/configuration.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/ReservationDao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $date = $_POST['date'];
    
    $pct = getAvailability($date);
        
    echo $pct;
}

?>
