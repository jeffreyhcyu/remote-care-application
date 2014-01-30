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
$getHash = $db->prepare("SELECT patientPassword FROM patientTargetBP WHERE patientID=?");
if($getHash === false) {
  trigger_error('SQL Statement Error: ' . $db->error, E_USER_ERROR); // Error message if fails
}

// Bind & Execute
$getHash->bind_param('s',$id);
$getHash->execute();
$getHash->bind_result($actual_password_hash);
$getHash->fetch();

// Check hashes
$input_password_hash = hash('sha512', $input_password);
if ($actual_password_hash == $input_password_hash)  
{
    $_SESSION['userID'] = $id;
    $_SESSION['userPassword'] = $input_password;  // We need to pass the text PW to the encryption functions later.
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
    