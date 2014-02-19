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
$getHash = $db->prepare("SELECT password FROM doctorInfo WHERE id=?");
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
    $_SESSION['userID'] = $id;
    $_SESSION['loginMessage'] = '';
    
    //Add successful login to the Access Log:
    $remoteIP = $_SERVER['REMOTE_ADDR'];
    $doctorLog = $db->prepare("INSERT INTO doctorAccessLog VALUES('',?,now(),?)");
    $doctorLog->bind_param('ss',$id,$remoteIP);
    $doctorLog->execute();
    $doctorLog->close();
    
header('Location: https://3yp.villocq.com/doctor/proMain.php'); 
}
else
{
    $_SESSION['loginMessage'] = 'Login Error';
    header('Location: https://3yp.villocq.com/doctor/index.php'); 
}

$db->close();

?>
    