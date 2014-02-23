<?php
//The below query gets the past 7 days data again, puts into an array $dayin
mysql_query("SELECT @i:=0;"); //pre-query
$dayquery = mysql_query("SELECT patientCurrentBPSystolic AS SBP, @i:=@i+1 AS DAY FROM (SELECT date,patientCurrentBPSystolic FROM patientCurrentBP WHERE patientID='test' ORDER BY date DESC LIMIT 7) AS value ORDER BY date");
$counter = 0;
while($row = mysql_fetch_array($dayquery))
{
$dayin[$counter] = $row[0];
$counter++;
}

echo $dayin[0];
echo '<br>';
echo $dayin[1];
echo '<br>';
echo $dayin[2];
echo '<br>';
echo $dayin[3];
echo '<br>';
echo $dayin[4];
echo '<br>';
echo $dayin[5];
echo '<br>';


?>