<?php
//PHP Handler for newPatientDetails.php

session_start();

//Save as temporary variables
$_SESSION['ageGroup'] = $_POST['ageGroup'];
$_SESSION['gender'] = $_POST['gender'];
$_SESSION['ethnicity'] = $_POST['ethnicity'];

// The user is directed to this page after completing the form. 

header("Location: newPatientComorbidities.html");

?>