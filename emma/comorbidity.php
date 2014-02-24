<?php

session_start();

if($_POST['formSubmit'] == "Submit")

{
	if($Gout == "Yes") {
		$Gout = 'checked';
		}

	if $Gout = 'checked'{
	$_SESSION['Gout'] = $_POST['Gout'];
	}

	$_SESSION['Heart_Failure'] = $_POST['Heart_Failure'];
	
	$_SESSION['Whitecoat'] = $_POST['Whitecoat'];

}

header("Location: newPatientTargetBP.php");

?>