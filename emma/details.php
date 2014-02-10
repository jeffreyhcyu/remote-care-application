<?php

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

$sql="