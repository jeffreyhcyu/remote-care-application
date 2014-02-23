<?php

session_start();

if($_POST['formSubmit'] == "Submit")
{
$_SESSION['Gout'] = $_POST['Gout'];

$_SESSION['Heart_Failure'] = $_POST['Heart_Failure'];

}
header("Location: newPatientTargetBP.php");

?>