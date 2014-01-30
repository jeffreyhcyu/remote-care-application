<?php
$username="3yp";
$DBpassword="project";
$database="tallis";

mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
@mysql_select_db($database);


$result = mysql_query("SELECT patientID, ageGroup FROM patientInfo");
$num = mysql_num_rows($result);

echo $num;

while($row = mysql_fetch_array($result))
  {
  //echo '<div class="Apatient"';
  echo $row['patientID'] . " " . $row['ageGroup'];
  //echo '</div>';
  }

mysql_close();
?>
