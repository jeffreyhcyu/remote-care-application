<?php

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


$varAgeGroup = $_POST['ageGroup'];

$varGender = $_POST['gender'];

$varEthnicity = $_POST['ethnicity'];


$sql = "INSERT INTO patientInfo (ageGroup, gender, ethnicity) VALUES (".

							PrepSQL($varAgeGroup) . ", " .

							PrepSQL($varGender) . ", " .

							PrepSQL($varEthnicity) . ", " .


			mysql_query($sql);

  // The user is directed to this page after completing the form. 
  // This code assumes that the thankyou form is in the same folder as the example form.
			
			header("Location: newPatientComorbidities.html");

			exit();
}

?>