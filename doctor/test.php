<?php
$username="3yp";
$DBpassword="project";
$database="tallis";

mysql_connect("remote.villocq.com:3306",$username,$DBpassword);
@mysql_select_db($database);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT patientID, ageGroup FROM patientInfo");

while($row = mysqli_fetch_array($result))
  {
  echo '<div class="Apatient"';
  echo $row['patientID'] . " " . $row['ageGroup'];
  echo '</div>';
  }

mysqli_close($con);
?>
