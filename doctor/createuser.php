<?php

// Php code for a user creation form

// Configure the MySQL connection
$username="3yp";
$DBpassword="project";
$database="tallis";

mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
@mysql_select_db($database) or die("Error! Something bad happened!");

//Assign the creation form POST output to PHP variables
$id=$_POST['username'];
$input_password=$_POST['password'];
$patient_name=$_POST['realname'];
$targetBPSys=$_POST['targetbpsystolic'];
$targetBPDia=$_POST['targetbpdiastolic'];

//Hash the user's password
$hashedPassword = hash('sha512', $input_password);

//Insert the data into the database
$insertStatement = "INSERT INTO patientTargetBP VALUES('',AES_ENCRYPT('$id','$input_password'),'$hashedPassword',AES_ENCRYPT('$patient_name','$input_password'),AES_ENCRYPT('$targetBPSys','$input_password'),AES_ENCRYPT('$targetBPDia','$input_password'))";
mysql_query($insertStatement);
mysql_close();

//echo:for testing
echo '$hashedPassword';
echo '<br>';
echo '$input_pasword';
?>
    