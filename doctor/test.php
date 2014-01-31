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




<html>
<head>
	
<script>
$( ".Identification1" ).click(function() {
// 'Getting' data-attributes using dataset 
var idNum = document.getElementById("idNo");
var idNumber = idNum.dataset.idNo; // leaves = 47;
alert( idNumber )
});
</script>

	<title></title>
</head>
<body>


<div class="Identification1" data-idNo=1>
lets have something to click 
</div>

</body>
</html>
