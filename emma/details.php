<?php
//PHP Handler for newPatientDetails.php

session_start();
<<<<<<< HEAD


// Configure the MySQL connection
$server="remote.villocq.com";
$username="3yp";
$DBpassword="project";
$database="tallis";
=======
>>>>>>> b28e615302d2c969c4509cc5ea3521aa91c94ba6

//Save as temporary variables
$_SESSION['ageGroup'] = $_POST['ageGroup'];
$_SESSION['gender'] = $_POST['gender'];
$_SESSION['ethnicity'] = $_POST['ethnicity'];

// The user is directed to this page after completing the form. 

<<<<<<< HEAD
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
=======
header("Location: newPatientComorbidities.html");
>>>>>>> b28e615302d2c969c4509cc5ea3521aa91c94ba6

?>