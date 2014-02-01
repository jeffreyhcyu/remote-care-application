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


$result = mysql_query("SELECT patientID, ageGroup, id FROM patientInfo");
$num = mysql_num_rows($result);

while($row = mysql_fetch_array($result))
  {
  echo '<div class="Apatient" data-idNo=' . $row['id']. '>'; //inserted the data tag data-id
  echo '<div class="Identification" data-idNo=' . $row['id']. '>';
  echo $row['patientID'] . " id:" . $row['id'];
  echo '</div>';
  echo '</div>';
  }



mysql_close();
?>

<?php
$username="3yp";
$DBpassword="project";
$database="tallis";

mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
@mysql_select_db($database);


$result2 = mysql_query("SELECT * FROM patientDrugs ");


mysql_close();
?>

<script>
$( ".Identification" ).click(function() {
// 'Getting' data-attributes using dataset 
var idNum = this.getAttribute("data-idNo");
//var idNumber = idNum.dataset.idNo; // leaves = 47;
window.location.href = "proMain.php?w1=" + idNum;
});
</script>



</div>

<div id="normal">
<div id="normaled">
Normal
</div>
<div class="Npatient">
James 
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
<?php echo $result2['drug1'] ?>
</td>
</tr>
<tr>
<td>Class</td>
<td>BB</td>
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
<td>Class</td>
<td>BB</td>
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
<td>Class</td>
<td>BB</td>
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
<td>Class</td>
<td>BB</td>
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
