<?php

// Check the person is logged in!
//session_start();    
//if (isset($_SESSION['docID']))
//{
  //  $doc_id = $_SESSION['docID'];
    //If logged in, go to the HTML page:
//}
//else
//{
//header('Location: https://3yp.villocq.com/patient'); 
//}
?>
<html>

<head>
<title>Cardiac Track Professional</title>
<link rel="stylesheet" type="text/css" href="Cardiac_Track_Style_Pro.css">

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
  echo $row['patientName'] . " " . $row['PatientID'];
  echo '</div>';
  }

mysqli_close($con);
?>
<div class="Apatient">
James Law
</div>
<div class="Apatient">
Tom Gibbs
</div>
<div class="Apatient">
Stephan Holmes
</div>
</div>

<div id="normal">
<div id="normaled">
Normal
</div>
<div class="Npatient">
James Law
</div>
<div class="Npatient">
Tom Gibbs
</div>
<div class="Npatient">
Stephan Holmes
</div>
</div>

</div>
<!--End of left hand of page-->

<div id="graph_container">
<div class="subtitle">
Graphs
</div>
this is where the graphs will go 
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
</tr>
<tr>
<td>Age</td>
<td>68</td>
</tr>	
<tr>
<td>Target Systolic BP</td>
<td>130</td>
</tr>
<tr style="color:red;">
<td>Current Systolic BP</td>
<td>135</td>
</tr>
<tr>
<td>Target Diastolic BP</td>
<td>90</td>
</tr>
<tr style="color:red;">
<td>Current Diastolic BP</td>
<td>87</td>
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
Med Name
</td>
</tr>
<tr>
<td>Daily Dosage</td>
<td>300mg</td>
</tr>	
<tr>
<td>Max Dosage</td>
<td>400mg</td>
</tr>
<tr>
<td>Time using drug</td>
<td>222 days</td>
</tr>
</table>
</div>

<div class="med_table2">
Med 2
<table id="med_table">
<tr>
<td>
Med Name
</td>
</tr>
<tr>
<td>Daily Dosage</td>
<td>300mg</td>
</tr>	
<tr>
<td>Max Dosage</td>
<td>400mg</td>
</tr>
<tr>
<td>Time using drug</td>
<td>222 days</td>
</tr>
</table>
</div>

<div class="med_table3">
Med 3
<table id="med_table">
<tr>
<td>
Med Name
</td>
</tr>
<tr>
<td>Daily Dosage</td>
<td>300mg</td>
</tr>	
<tr>
<td>Max Dosage</td>
<td>400mg</td>
</tr>
<tr>
<td>Time using drug</td>
<td>222 days</td>
</tr>
</table>
</div>

<div class="med_table4">
Med 4
<table id="med_table">
<tr>
<td>
Med Name
</td>
</tr>
<tr>
<td>Daily Dosage</td>
<td>300mg</td>
</tr>	
<tr>
<td>Max Dosage</td>
<td>400mg</td>
</tr>
<tr>
<td>Time using drug</td>
<td>222 days</td>
</tr>
</table>
</div>
</div>


</div>
</html>