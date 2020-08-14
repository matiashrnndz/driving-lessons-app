<?php

require_once($_SERVER['DOCUMENT_ROOT'] . 'driving-lessons/models/UserDao.php');

$email = $_POST['email'];

approveUser($email);
