<?php

// Php code for a user creation form
// This new version uses PHPass for the hashing

// Configure the MySQL connection
$server="remote.villocq.com";
$username="3yp";
$DBpassword="project";
$database="tallis";

// New MySQLi Instance
$db = new mysqli($server,$username,$DBpassword,$database);

//Assign the creation form POST output to PHP variables
$id=$_POST['username'];
$input_password=$_POST['password'];
$patient_name=$_POST['realname'];
$targetBPSys=$_POST['targetbpsystolic'];
$targetBPDia=$_POST['targetbpdiastolic'];

//Hashing Function
require("PasswordHash.php"); //This is the PHPass framework
$hasher = new PasswordHash(10,false); // 10 is the cost function setting
$hashedPassword = $hasher->HashPassword($input_password);
// Password is now hashed as $hashedPassword

//Prepared statement
$submit = $db->prepare("INSERT INTO patientTargetBP VALUES('',?,?,?,?,?,'0')");

//Bind & Execute to submit to database
$submit->bind_param('sssss',$id,$hashedPassword,$patient_name,$targetBPSys,$targetBPDia);
$submit->execute();
$submit->close();
//Data has now been submitted to the database

?>