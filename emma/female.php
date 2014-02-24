<?php

session_start();

if($_POST['formSubmit'] == "Submit")
{
$_SESSION['breasteed'] = $_POST['breastfeed'];

$_SESSION['future_pregnancy'] = $_POST['future_pregnancy'];
}

header("Location: newPatientComorbidities.php");

?>