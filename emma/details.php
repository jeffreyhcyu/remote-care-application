<?php

session_start();

if($_POST['formSubmit'] == "Submit")
{
$_SESSION['ageGroup'] = $_POST['ageGroup'];

$_SESSION['gender'] = $_POST['gender'];

$_SESSION['ethnicity'] = $_POST['ethnicity'];
}
header("Location: newPatientComorbidities.php");

?>