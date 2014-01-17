<?php

// PHP code for a user creation form

// PDO connector (DB)
include_once("pdo_mysql.php"); 

// Configure the MySQL connection
$username="3yp";
$DBpassword="project";
$database="tallis";
pdo_connect('remote.villocq.com:3306',$username,$DBpassword);
pdo_select_db($database);

//Assign the creation form POST output to PHP variables
$id=$_POST['username'];
$input_password=$_POST['password'];
$patient_name=$_POST['realname'];
$targetBPSys=$_POST['targetbpsystolic'];
$targetBPDia=$_POST['targetbpdiastolic'];

//Hash the user's password
$hashedPassword = hash('sha512', $input_password);

//Insert the data into the database
$insertStatement = "INSERT INTO patientTargetBP VALUES('',AES_ENCRYPT(?,?),?,AES_ENCRYPT(?,?),AES_ENCRYPT(?,?),AES_ENCRYPT(?,?),'0')";
pdo_query($insertStatement,$id,$input_password,$hashedPassword,$patient_name,$input_password,$targetBPSys,$input_password,$targetBPDia,$input_password);

?>
    