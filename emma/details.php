<?php

session_start();

if($_POST['formSubmit'] == "Submit")
{
$_SESSION['ageGroup'] = $_POST['ageGroup'];

$_SESSION['gender'] = $_POST['gender'];

$_SESSION['ethnicity'] = $_POST['ethnicity'];
}

if($_SESSION['gender'] == "Female")
{
header("Location: newPatientFemale.php");
}
else
{
  
$_SESSION['breastfeed'] = "No";
$_SESSION['future_pregnancy'] = "No";

header("Location: newPatientComorbidities.php");
}

?>