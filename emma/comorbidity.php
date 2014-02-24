<?php

session_start();

if($_POST['formSubmit'] == "Submit")

{
	if($_POST['Gout'] == "Yes");
	{
	$_SESSION['Gout'] = $_POST['Gout'];
	}
	if($_POST['Heart_Failure'] == "Yes");
	{
	$_SESSION['Heart_Failure'] = $_POST['Heart_Failure'];
	}
	if($_POST['Whitecoat'] == "Yes");
	{
	$_SESSION['Whitecoat'] = $_POST['Whitecoat'];
	}
}

header("Location: newPatientTargetBP.php");

?>