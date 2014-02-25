<?php
// Login Form

// enable sessions
session_start();

// Configure the MySQL connection parameters
$server='remote.villocq.com';
$username='3yp';
$DBpassword='project';
$database='tallis';

// New MySQLi Instance
$db = new mysqli($server,$username,$DBpassword,$database);

if ($db->connect_error) {
  trigger_error('Database connection failed: '  . $db->connect_error, E_USER_ERROR); // Error message if fails
}

//Assign the login form POST output to PHP variables
$id=$_POST['username'];
$input_password=$_POST['password'];

// Get and compare the hashed passwords:
// Prepared statement
$getHash = $db->prepare("SELECT password FROM patientInfo WHERE patientID=?");
if($getHash === false) {
  trigger_error('SQL Statement Error: ' . $db->error, E_USER_ERROR); // Error message if fails
}

// Bind & Execute
$getHash->bind_param('s',$id);
$getHash->execute();
$getHash->bind_result($actual_password_hash);
$getHash->fetch();

// Check password matches, using PHPass here
require("PasswordHash.php");
$hasher = new PasswordHash(10,false); // 10 is the cost function setting
$checkPassword = $hasher->CheckPassword($input_password,$actual_password_hash);

// If good password:
if ($checkPassword)  
{
    $_SESSION['patientAppID'] = $id;
    $_SESSION['loginMessage'] = '';
    
header('Location: https://3yp.villocq.com/patient/menu.php'); 
}
else
{
    $_SESSION['loginMessage'] = 'Login Error';
    header('Location: https://3yp.villocq.com/patient'); 
}

$db->close();

?>
    