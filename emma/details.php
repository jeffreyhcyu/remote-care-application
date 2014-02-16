<?php

// Configure the MySQL connection
$server="remote.villocq.com";
$username="3yp";
$DBpassword="project";
$database="tallis";

// New MySQLi Instance
$db = new mysqli($server,$username,$DBpassword,$database);

$sql="INSERT INTO patientInfo (ageGroup, ethnicity, gender)
VALUES
('$_POST[ageGroup]','$_POST[ethnicity]', '$_POST[gender]')";
mysql_close($db)
?>