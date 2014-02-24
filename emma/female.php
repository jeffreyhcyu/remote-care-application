<?php

session_start();

if($_POST['formSubmit'] == "Submit")
{
	if($_SESSION['gender'] == "Female")
		{
		$_SESSION['breasteed'] = $_POST['breastfeed'];

		$_SESSION['future_pregnancy'] = $_POST['future_pregnancy'];
		}
	else
	{
		$_SESSION['breasteed'] = "No";

		$_SESSION['future_pregnancy'] = "No";
	}
}

header("Location: newPatientComorbidities.php");

?>