<?php

session_start();

//Save as temporary variables
$_SESSION['ageGroup'] = $_POST['ageGroup'];
$_SESSION['gender'] = $_POST['gender'];
$_SESSION['ethnicity'] = $_POST['ethnicity'];

echo $_SESSION['ageGroup'];
echo '<br>';
echo $_SESSION['gender'];
echo '<br>';
echo $_SESSION['ethnicity'];


// The user is directed to this page after completing the form. 

header("Location: newPatientComorbidities.html");




?>