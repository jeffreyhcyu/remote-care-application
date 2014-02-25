<?php

session_start();

if($_POST['formSubmit'] == "Submit")
{
	if($_SESSION['gender'] == "Female")
		{
		$_SESSION['breastfeed'] = $_POST['breastfeed'];

		$_SESSION['future_pregnancy'] = $_POST['future_pregnancy'];
		}
	else
	{
		$_SESSION['breastfeed'] = "No";

		$_SESSION['future_pregnancy'] = "No";
	}
}

header("Location: newPatientComorbidities.php");

?>