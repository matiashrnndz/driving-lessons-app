<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/LicenseDao.php');

$usuarioId = $_POST['usuario_id'];

addLicense($usuarioId);

?>