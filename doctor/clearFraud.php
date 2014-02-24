<?php
    
// Configure the MySQL connection
$username="3yp";
$DBpassword="project";
$database="tallis";

mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
@mysql_select_db($database);

$patientUsername = $_SESSION['patientUsername'];

//Perform the SQL Query
mysql_query("UPDATE FraudFlag SET flag='0' WHERE username = '$patientUsername'");

mysql_close();

echo "window.close();";

?>