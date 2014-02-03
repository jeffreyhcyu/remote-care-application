<html>

<head>
<title>Cardiac Track Professional</title>
<link rel="stylesheet" type="text/css" href="Cardiac_Track_Style_Pro.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>



</head>
<div class="full_screen">

<!--Start of left hand of page-->

<div class="patient_selector">

<div id="patients">
Patients
</div>
<div id="alert">
<div id="alerted">
Alerted
</div>


<?php
$username="3yp";
$DBpassword="project";
$database="tallis";

mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
@mysql_select_db($database);


$result = mysql_query("SELECT i.id, i.patientID FROM patientInfo AS i JOIN patientTargetBP AS t ON t.patientID=i.patientID WHERE t.flag=1");

$num = mysql_num_rows($result);

while($row = mysql_fetch_array($result))
  {
  echo '<div class="Apatient" data-idNo=' . $row['id']. '>'; //inserted the data tag data-id
  echo '<div class="Identification" data-idNo=' . $row['id']. '>';
  echo $row['patientID'] . " id:" . $row['id'];
  echo '</div>';
  echo '</div>';
  }

$result5 = mysql_query("SELECT i.id, i.patientID FROM patientInfo AS i JOIN patientTargetBP AS t ON t.patientID=i.patientID WHERE t.flag=0");

$num5 = mysql_num_rows($result5);



$current=$_GET["w1"];

$result2 = mysql_query("SELECT * FROM patientDrugs WHERE id=$current");
$med = mysql_fetch_array($result2);

$result3 = mysql_query("SELECT * FROM patientInfo WHERE id=$current");
$info=mysql_fetch_array($result3);

$result6 = mysql_query("SELECT * FROM doctorInfo WHERE id=1");
$docInfo=mysql_fetch_array($result6);

mysql_close();
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
		<?php

		// enable sessions
		//session_start();

		// Configure the MySQL connection
		$username="3yp";
		$DBpassword="project";
		$database="tallis";

		mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
		@mysql_select_db($database);

		$current=$_GET["w1"];

		//Perform the SQL Query
		$SQLQuery = "SELECT b.date, b.patientCurrentBPSystolic, b.patientCurrentBPDiastolic
	    FROM patientCurrentBP AS b JOIN patientInfo AS i ON b.patientID=i.patientID WHERE i.id='$current'";

		$result4 = mysql_query($SQLQuery);
		$num = mysql_num_rows($result4);


		//This builds an array that contains the BP values. This array is then used by the javascript to make the chart.
		//Source code below provided by: http://www.kometschuh.de/GoogleChartToolswithJSON.html
		$data[0] = array('day','SystolicBP','DiastolicBP');		
		for ($i=1; $i<($num+1); $i++)
		{
		    $data[$i] = array(substr(mysql_result($result4, $i-1, "date"), 0, 10),
		    		(int) mysql_result($result4, $i-1, "patientCurrentBPSystolic"),
				(int) mysql_result($result4, $i-1, "patientCurrentBPDiastolic") );
		}

		echo json_encode($data);


		mysql_close();

		?>
    );

        var options = {
          //title: 'Blood Pressure',
          //titleTextStyle: {color: 'red', fontSize: '40', fontName: 'arial' },
          //chartArea.top: '30',
          //backgroundColor.stroke: {#80807D},
          //vAxis.baselineColor: 'red',
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
         
      }
    </script>

</div>

<div id="normal">
<div id="normaled">
Normal
</div>
<?php
while($row5 = mysql_fetch_array($result5))
  {
  echo '<div class="Npatient" data-idNo=' . $row5['id']. '>'; //inserted the data tag data-id
  echo '<div class="Identification" data-idNo=' . $row5['id']. '>';
  echo $row5['patientID'] . " id:" . $row5['id'];
  echo '</div>';
  echo '</div>';
  }
?>
</div>

<script>
$( ".Identification" ).click(function() {
// 'Getting' data-attributes using dataset 
var idNum = this.getAttribute("data-idNo");
//var idNumber = idNum.dataset.idNo; // leaves = 47;
window.location.href = "proMain.php?w1=" + idNum;
});
</script>

</div>
<!--End of left hand of page-->

<div id="graph_container">
<div class="subtitle">
Welcome <?php echo $docInfo['prefix'] . $docInfo['firstName'] . $docInfo['secondName'] ?>
</div>
<div id="chart_div" style="	position: relative;
	left: 200px;
	top:100px;
	height:500px;
	width:1100px;
	opacity:0.9;
	filter:alpha(opacity=90); /* For IE8 and earlier */
	z-index: 5;"></div> 
</div>

<div id="info_container">
<div class="subtitle">
Patient Info
</div>
<table id="info_table">
<tr>
<td>
ID Number
</td>
<td><?php echo $_GET['w1']?><td>
</tr>
<tr>
<td>Age</td>
<td><?php echo $info['ageGroup'] ?></td>
</tr>	
<tr>
<td>Target Systolic BP</td>
<td><?php echo $info['targetSystolic'] ?></td>
</tr>
<tr style="color:red;">
<td>Current Systolic BP</td>
<td></td> <!--need DB update-->
</tr>
<tr>
<td>Target Diastolic BP</td>
<td><?php echo $info['targetDiastolic'] ?></td>
</tr>
<tr style="color:red;">
<td>Current Diastolic BP</td>
<td></td>
</tr>
</table>
</div>



<div id="med_container">
<div class="subtitle">
Medication
</div>

<div class="med_table1">
Med 1
<table id="med_table">
<tr>
<td>
<?php echo $med['drug1'] ?>
</td>
</tr>
<tr>
<td>Class</td>
<td><?php echo $med['drug1class'] ?></td>
</tr>
<tr>
<td>Daily Dosage</td>
<td><?php echo $med['drug1prescription'] ?></td>
</tr>	
<tr>
<td>On Max Dosage</td>
<td><?php echo $med['isOnMaxDose'] ?></td>
</tr>
<tr>
<td>Time using drug</td>
<td></td> <!--NEED DB STUFF TO IMPLEMENT-->
</tr>
</table>
</div>

<div class="med_table2">
Med 2
<table id="med_table">
<tr>
<td>
<?php echo $med['drug2'] ?>
</td>
</tr>
<tr>
<td>Class</td>
<td><?php echo $med['drug2class'] ?></td>
</tr>
<tr>
<td>Daily Dosage</td>
<td><?php echo $med['drug2prescription'] ?></td>
</tr>	
<tr>
<td>On Max Dosage</td> <!--needs on for each-->
<td><?php echo $med['isOnMaxDose'] ?></td>
</tr>
<tr>
<td>Time using drug</td>
<td></td> <!--NEED DB STUFF TO IMPLEMENT-->
</tr>
</table>
</div>

<div class="med_table3">
Med 2
<table id="med_table">
<tr>
<td>
<?php echo $med['drug3'] ?>
</td>
</tr>
<tr>
<td>Class</td>
<td><?php echo $med['drug3class'] ?></td>
</tr>
<tr>
<td>Daily Dosage</td>
<td><?php echo $med['drug3prescription'] ?></td>
</tr>	
<tr>
<td>On Max Dosage</td> <!--needs on for each-->
<td><?php echo $med['isOnMaxDose'] ?></td>
</tr>
<tr>
<td>Time using drug</td>
<td></td> <!--NEED DB STUFF TO IMPLEMENT-->
</tr>
</table>
</div>

<div class="med_table4">
Med 4
<table id="med_table">
<tr>
<td>
<?php echo $med['drug4'] ?>
</td>
</tr>
<tr>
<td>Class</td>
<td><?php echo $med['drug4class'] ?></td>
</tr>
<tr>
<td>Daily Dosage</td>
<td><?php echo $med['drug4prescription'] ?></td>
</tr>	
<tr>
<td>On Max Dosage</td> <!--needs on for each-->
<td><?php echo $med['isOnMaxDose'] ?></td>
</tr>
<tr>
<td>Time using drug</td>
<td></td> <!--NEED DB STUFF TO IMPLEMENT-->
</tr>
</table>
</div>
</div>


</div>
</html>
