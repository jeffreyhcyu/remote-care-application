<?php

session_start();

if($_POST['formSubmit'] == "Submit")

{
	$_SESSION['Gout'] = $_POST['Gout'];

	$_SESSION['Heart_failure'] = $_POST['Heart_failure'];
	
	$_SESSION['Whitecoat'] = $_POST['Whitecoat'];

}

header("Location: newPatientTargetBP.php");

?>