<?php

session_start();


// Configure the MySQL connection
$server="remote.villocq.com";
$username="3yp";
$DBpassword="project";
$database="tallis";

// New MySQLi Instance
$db = new mysqli($server,$username,$DBpassword,$database);

if($_POST['formSubmit'] == "Submit")
{
	$errorMessage = "";

		if(empty($_POST['ageGroup'])) 
        {
			$errorMessage .= "<li>Please select age group.</li>";
		}
		
		if(empty($_POST['gender'])) 
        {
		$errorMessage .= "<li>Please select a sex</li>";
		}


		if(empty($_POST['ethnicity'])) 

        {

		$errorMessage .= "<li>Please indicate if patient is of Black African or Black Caribbean descent.</li>";

		}


$_SESSION['ageGroup'] = $_POST['ageGroup'];

$_SESSION['gender'] = $_POST['gender'];

$_SESSION['ethnicity'] = $_POST['ethnicity'];

header("Location: newPatientComorbidities.php");

}

?>